<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use Storage;
use InterventionImage;
use Image;
use Illuminate\Support\Str;

use App\Http\Requests\TweetRequest;


class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $q = \Request::query();


        if(isset($q['tag_name'])){
            $tweets = Tweet::with(['user', 'tags'])->latest()->where('tag_box', 'like', "%{$q['tag_name']}%")->paginate(10);
            $tags = \DB::table('tags')->get();

            return view('tweets.index', [
                'tweets' => $tweets,
                'tags' => $tags,
                'tag_name' => $q['tag_name']
            ]);
        }else {

            $tweets = Tweet::with(['user', 'tags'])->latest()->paginate(10);
            $tags = \DB::table('tags')->get();

            $tags_name = [];
            foreach ($tags as $tag) {
                array_push($tags_name, $tag->tag_name);
            }

            return view('tweets.index', [
                'tweets' => $tweets,
                'tags' => $tags
            ]);


        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweets.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $request)
    {
        $tweet = new Tweet;
        $tweet->user_id = $request->user_id;
        $tweet->content = $request->content;
        $tweet->tag_box = $request->tag_box;
        $tweet->title = $request->title;

        \Slack::send('Hello World!');
      
        if($request->hasFile('image')){
            $filename = $request->file('image');
            $name = $filename->getClientOriginalName(); 
            $ext = strtolower(substr($filename->getClientOriginalName(), strrpos($filename->getClientOriginalName(), '.')+1));
            if(!in_array($ext, ['png', 'jpg', 'gif', 'jpeg'], true)) {
                $tag_view = '画像以外のファイルが指定されています。画像ファイル(png/jpg/jpeg/gif)を指定して下さい';
                return view('tweets.tag', compact('tag_view'));
            }

            $imageFile = time(). '_' . $name;
            $imagePath = storage_path('app/public/') . $imageFile;
            $image = Image::make($filename)
                ->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();//横幅を1000にして縦横比を保持したまま変更を行う。
                    $constraint->upsize();//小さい写真を無理やり1000にすることをせずにそのままのサイズを維持する。
                })
                ->orientate()//画像の向きを自動的に調整する。
                ->save($imagePath);

            $path = Storage::disk('s3')->putFile('myprefix',$imagePath, 'public');
            $tweet->image = Storage::disk('s3')->url($path);

            Storage::disk('local')->delete('app/public/' . $imageFile);
        } 

        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->tag_box, $match);

        $tags = [];
        foreach ($match[1] as $tag) {
            $found = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($tags, $found);
        }

        $tag_ids = [];
        foreach ($tags as $tag) {
            array_push($tag_ids, $tag['id']);
        }

        $tag_count = count($tag_ids);
        if ($tag_count <= 5){
            $tweet->save();
            $tweet->tags()->attach($tag_ids);

            return redirect('/top');
        } else{
            $tag_view = 'タグ数が５つ以上ですので変更してください。';
            $tweet_id = $id;
            return view('tweets.tag-edit', compact('tag_view','tweet_id'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {

        $tweetid = $tweet->id;
        $comments = Comment::where('tweet_id', '=', $tweetid)->get();

        return view('tweets.show',[
            'tweet' => $tweet,
            'comments' => $comments,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = Tweet::with(['user','comments'])->findOrFail($id);
        return view('tweets.edit',[
            'tweet' => $tweet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->tweet_id;
        $tweet = Tweet::findOrFail($id);
        $tweet->content = $request->content;
        $tweet->title = $request->title;
        $tweet->user_id = $request->user_id;
        $tweet->tag_box = $request->tag_box;

        if($request->hasFile('image')){
            $filename = $request->file('image');
            $name = $filename->getClientOriginalName(); 
            $ext = strtolower(substr($filename->getClientOriginalName(), strrpos($filename->getClientOriginalName(), '.')+1));
            if(!in_array($ext, ['png', 'jpg', 'gif', 'jpeg'], true)) {
                $tag_view = '画像以外のファイルが指定されています。画像ファイル(png/jpg/jpeg/gif)を指定して下さい';
                return view('tweets.tag', compact('tag_view'));
            }

            $imageFile = time(). '_' . $name;
            $imagePath = storage_path('app/public/') . $imageFile;
            $image = Image::make($filename)
                ->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->orientate()
                ->save($imagePath);

            $path = Storage::disk('s3')->putFile('myprefix',$imagePath, 'public');
            $tweet->image = Storage::disk('s3')->url($path);

            Storage::disk('local')->delete('app/public/' . $imageFile);
        }

        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->tag_box, $match);

        $tags = [];
        foreach ($match[1] as $tag) {
            $found = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($tags, $found);
        }

        $tag_ids = [];
        foreach ($tags as $tag) {
            array_push($tag_ids, $tag['id']);
        }


        $tag_count = count($tag_ids);
        if ($tag_count <= 5){
            $tweet->save();
            $tweet->tags()->sync($tag_ids);

            return redirect('/top');
        } else{
            $tag_view = 'タグ数が５つ以上ですので変更してください。';
            $tweet_id = $id;
            return view('tweets.tag-edit', compact('tag_view','tweet_id'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tweet = TWeet::find($id);


        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $tweet->tag_box, $match);

        $tags = [];
        foreach ($match[1] as $tag) {
            $found = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($tags, $found);
        }

        $tag_ids = [];
        foreach ($tags as $tag) {
            array_push($tag_ids, $tag['id']);
        }


        $tweet->tags()->delete($tag_ids);
        $tweet->delete();
        return redirect('/top');

    }

    public function search(Request $request)
    {

        $tweets = Tweet::where('title' ,'like', "%{$request->search}%")
        ->orwhere('content' ,'like', "%{$request->search}%")
        ->paginate(10);

        $search_result = '【'. $request->search. '】の検索結果は'.$tweets->total().'件';

        $tags = \DB::table('tags')->get();
        return view('tweets.index',[
            'tweets' => $tweets,
            'search_result' => $search_result,
            'search_query'  => $request->search,
            'tags' => $tags,
        ]);
    }
}

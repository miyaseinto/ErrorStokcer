<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;


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
            $tweets = Tweet::latest()->where('tag_box', 'like', "%{$q['tag_name']}%")->paginate(10);
            $tweets->load('user', 'tags');

            return view('tweets.index', [
                'tweets' => $tweets,
                'tag_name' => $q['tag_name']
            ]);
        }else {
     
            $tweets = Tweet::latest()->paginate(10);
            $tweets->load('user', 'tags');
            
            return view('tweets.index', [
                'tweets' => $tweets,
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


        // $imageName = str_shuffle($request->file('image')->getClientOriginalName()). '.' . $request->file('image')->getClientOriginalExtension(). '.' . $request->file('image')->getRealPath();//ファイル名をユニックするためstr_shuffleを使う
        // dd($imageName);
        
        
        if($request->image){
            $filename = $request->file('image')->store('public/image');
            $tweet->image = basename($filename);
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

        $tweet->save();
        $tweet->tags()->attach($tag_ids);

        return redirect('/');

        

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

        $tweet->load('user','comments');

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
        $tweet = Tweet::findOrFail($id);
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

        if($request->image){
            $filename = $request->file('image')->store('public/image');
            $tweet->image = basename($filename);
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
        

        $tweet->tags()->sync($tag_ids);

        $tweet->update();
        return redirect('/');

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
        $tweet->delete();


        return redirect('/');
    }

    public function search(Request $request)
    {

        $tweets = Tweet::where('title' ,'like', "%{$request->search}%")
        ->orwhere('content' ,'like', "%{$request->search}%")
        ->paginate(10);


        $search_result = '【'. $request->search. '】の検索結果は'.$tweets->total().'件';

        return view('tweets.index',[
            'tweets' => $tweets,
            'search_result' => $search_result,
            'search_query'  => $request->search,
        ]);
    }
}

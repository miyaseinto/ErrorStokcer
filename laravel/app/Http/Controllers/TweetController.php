<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
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
        $tweets = Tweet::latest()->paginate(3);
        $tweets->load('user');
        return view('tweets.index', ['tweets' => $tweets]);

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
        $tweet->title = $request->title;
        $tweet->save();;
        
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

        $tweet->load('user');

        return view('tweets.show',[
            'tweet' => $tweet,
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
        $tweet->save();
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
        ->paginate(3);


        $search_result = '【'. $request->search. '】の検索結果は'.$tweets->total().'件';

        return view('tweets.index',[
            'tweets' => $tweets,
            'search_result' => $search_result,
            'search_query'  => $request->search,
        ]);
    }
}

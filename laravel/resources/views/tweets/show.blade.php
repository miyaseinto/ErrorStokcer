@extends('layouts.app')

@section('content')
<h2 class="card-header" style="text-align: center;">
  投稿詳細
</h2>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if (isset($tweet->image))
      <div class="text-center">
        <a href="{{ asset($tweet->image) }}" data-lightbox="group" >
          <img src="{{ asset($tweet->image) }}" style="max-height: 300px;" class="img-thumbnail">
        </a>
      </div>
      <div class="text-sm-right">
        ※写真をクリックすると拡大します。
      </div>
    @else
    @endif
    <div class="card">
      <div class="card-body">
        <div class="alert alert-success" role="alert">
            <h6 class="card-title">
              {{ "@".$tweet->user->name }}の投稿
            </h6>
            <h2 class="card-title">{{ $tweet->title }}</h2>
        </div>
        <h5 class="card-title">
          <i class="fas fa-tags"></i>
            @foreach($tweet->tags as $tag)
                <a href="{{ route('tweets.index', ['tag_name' => $tag->tag_name]) }}" class="badge badge-success">
                    #{{ $tag->tag_name }}
                </a>
            @endforeach
        </h5>
        <div class="card-text">
          {!! $tweet->markdown_body !!}
        </div>
        @if ($tweet->user_id == Auth::user()->id)
          <div class="dropdown open">
            <button class="btn btn-primary dropdown-toggle"
                    type="button" id="dropdownMenu4" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
              Edit&Delete
            </button>
            <div class="dropdown-menu">
              <a href="{{ route('tweets.edit', $tweet->id) }}" type="button" class="dropdown-item">編集</a>
                <form action="{{ route('tweets.destroy',$tweet->id )}}" method="post" >
                    {{ csrf_field() }}
                    <input type="submit" value="削除" class="dropdown-item" >
                </form>
              <a href="{{ route('comments.create', ['tweet_id' => $tweet->id]) }}" class="dropdown-item">コメント</a>
            </div>
          </div>  
        @else
          <a href="{{ route('comments.create', ['tweet_id' => $tweet->id]) }}" class="btn btn-primary">コメント</a>
        @endif
      </div>
    </div>
</div>
<div class="alert alert-primary m-3 shadow row">
  <i class="fas fa-comments " style="font-size:35px;"></i>
  <h5 class="card-title m-0 pl-3 align-self-center">
    コメント一覧
  </h5>
</div>
@foreach($comments as $comment)
  <div class="card mx-3 my-2 shadow">
      <div class="card-header d-flex bd-highlight" >
        @if($comment->user_id == 1)
          ゲスト
          <div class="text-muted pl-2 flex-grow-1 bd-highlight">
            {{$comment->created_at}}
          </div>
        @elseif($comment->user_id == Auth::user()->id)
          <a href="{{ route('users.show', $comment->user_id) }}" class="btn btn-outline-primary btn-sm lex-grow-1 bd-highlight ">
            {{"@".$comment->user->name}}
          </a>
          <div class="text-muted pl-2 my-box mr-auto align-self-center">
            {{$comment->created_at}}
          </div>
          <div class="dropdown open text-muted justify-content-end">
            <i class="fas fa-ellipsis-h " type="button" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('comments.edit', $comment->id) }}">編集</a>
              <form action="{{ route('comments.destroy', $comment->id) }}" method="post" >
                  {{ csrf_field() }}
                  <input type="submit" value="削除" class="dropdown-item" >
              </form>
            </div>
          </div>
        @else
          <a href="{{ route('users.show', $comment->user_id) }}" class="btn btn-outline-primary btn-sm lex-grow-1 bd-highlight ">
            {{"@".$comment->user->name}}
          </a>
          <div class="text-muted pl-2 my-box mr-auto align-self-center">
            {{$comment->created_at}}
          </div>
        @endif
      </div>
    <div class="card-body">
      <p class="card-text">{!! $comment->markdown_body !!}</p>
    </div>
  </div>
  @endforeach
@endsection


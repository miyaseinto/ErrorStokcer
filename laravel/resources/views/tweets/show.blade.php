@extends('layouts.app')

@section('content')
<div class="card-header" style="text-align: center;">投稿詳細</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $tweet->title }}</h5>
        <h5 class="card-title">
            投稿者：{{ $tweet->user->name }}
        </h5>
        <h5 class="card-title">
            Tag:
            @foreach($tweet->tags as $tag)
                <a href="{{ route('tweets.index', ['tag_name' => $tag->tag_name]) }}" class="badge badge-success">
                    #{{ $tag->tag_name }}
                </a>
            @endforeach
          </h5>
        <p class="card-text">{{ $tweet->content }}</p>
        @if ($tweet->user_id == Auth::user()->id)
            <div class="dropdown open">
              <button class="btn btn-primary dropdown-toggle"
                      type="button" id="dropdownMenu4" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                Edit&Delete
              </button>
              <div class="dropdown-menu">
                <a href="{{ route('tweets.edit', $tweet->id) }}" type="button" class="dropdown-item">編集</a>
                <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post" >
                    {{ csrf_field() }}
                    <input type="submit" value="削除" class="dropdown-item" >
                </form>
              </div>
            </div>  
          @else
          @endif
      </div>
    </div>
</div>
@endsection

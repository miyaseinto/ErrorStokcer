@extends('layouts.app')

@section('content')

<div class="card-header">
  投稿一覧
</div>


<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @foreach ($tweets as $tweet)
      <div class="card">
        <div class="card-body">
        <h5 class="card-title">{{ $tweet->title }}</h5>
          <h5 class="card-title">
              投稿者：
              <a href="{{ route('users.show', $tweet->user_id) }}">{{ $tweet->user->name }}</a>
          </h5>
          <p class="card-text">{{ $tweet->content }}</p>
          <a href="{{ route('tweets.show', $tweet->id) }}" class="btn btn-primary">詳細</a>
          @auth
            <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                {{ csrf_field() }}
                <input type="submit" value="削除" class="btn btn-danger" style="position: relative;top: -37px;right: -60px;" >
            </form>
          @endauth
        </div>
      </div>
    @endforeach
</div>
@endsection

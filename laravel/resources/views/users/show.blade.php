@extends('layouts.app')

@section('content')
<div class="card-header">{{ $user->name }}の投稿</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @foreach ($user->tweets as $tweet)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $tweet->title }}</h5>
          <h5 class="card-title">
              投稿内容
          </h5>
          <p class="card-text">{{ $tweet->content }}</p>
          <a href="{{ route('tweets.show', $tweet->id) }}" class="btn btn-primary">詳細</a>
        </div>
      </div>
    @endforeach
</div>
@endsection
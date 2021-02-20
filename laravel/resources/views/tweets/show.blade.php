@extends('layouts.app')

@section('content')
<div class="card-header">Board</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
            投稿者：{{ $tweet->user->name }}
        </h5>
        <p class="card-text">{{ $tweet->content }}</p>
        <a href="{{ route('tweets.edit', $tweet->id) }}" class="btn btn-primary">編集</a>
        
      </div>
    </div>
</div>
@endsection

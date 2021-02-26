@extends('layouts.app')

@section('content')
<div class="card-header" style="text-align: center;">{{ $user->name }}の投稿</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

@foreach ($tweets as $tweet)
  <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
          <h1 class="mr-auto">
            <a href="{{ route('tweets.show', $tweet->id) }}" class="text-dark">
              {{ $tweet->title }}
            </a>
          </h1>
          <span class="text-muted" style="font-size:15px;">{{ $tweet->created_at->format('Y年m月d日')  }}にストック</span>
      </div>
      <div class="toast-body">
          <h5 class="card-title">
              <i class="fas fa-tags"></i>
              @foreach($tweet->tags as $tag)
                  <a href="{{ route('tweets.index', ['tag_name' => $tag->tag_name]) }}" class="badge badge-success">
                      #{{ $tag->tag_name }}
                  </a>
              @endforeach
          </h5>
      </div>
  </div>
@endforeach
{{ $tweets->links() }}
</div>
@endsection
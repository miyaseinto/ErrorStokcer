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
      <div class="card">
        <div class="card-body">
          <a href="{{ route('tweets.show', $tweet->id) }}" class="text-dark">
            <span class="text" style="font-size:30px;">{{ $tweet->title }}</span>
          </a>
          <span class="text-muted" style="font-size:15px;">{{ $tweet->created_at->format('Y年m月d日')  }}にストック</span>
          <h5 class="card-title">
              <i class="fas fa-tags"></i>
                @foreach($tweet->tags as $tag)
                    <a href="{{ route('tweets.index', ['tag_name' => $tag->tag_name]) }}" class="badge badge-success">
                        #{{ $tag->tag_name }}
                    </a>
                @endforeach
          </h5>
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
    @endforeach
  {{ $tweets->links() }}
</div>
@endsection
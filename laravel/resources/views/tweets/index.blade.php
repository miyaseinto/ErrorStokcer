@extends('layouts.app')

@section('content')

<div class="card-header" style="text-align: center;">
  投稿一覧
</div>

@isset($search_result)
<h5 class="card-title" style="text-align: center; padding-top: 30px; font-size: 20px; color: #55c500">{{ $search_result }}</h5>
@endisset


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
              が
              <span class="text-muted" style="font-size:15px;">{{ $tweet->created_at->format('Y年m月d日')  }}にストック</span>
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
          <a href="{{ route('tweets.show', $tweet->id) }}" class="btn btn-primary">詳細</a>
        </div>
      </div>
    @endforeach


@if(isset($tag_name))
    {{ $tweets->appends(['tag_name' => $tag_name])->links() }}
@elseif(isset($search_query))
    {{ $tweets->appends(['search' => $search_query])->links() }}
@else
    {{ $tweets->links() }}
@endif

</div>
@endsection

@extends('layouts.app')

@section('content')

<h2 class="card-header" style="text-align: center;">
  投稿一覧
</h2>


    @isset($search_result)
    <h5 class="card-title" style="text-align: center; padding-top: 30px; font-size: 20px; color: #55c500">{{ $search_result }}</h5>
    @endisset

<div class="row m-3">
        <div class="col-sm-3">
        <h5 class="card-title"><i class="fas fa-tags"></i>タグ一覧</h5>
            @foreach($tags as $tag)
                <a href="{{ route('tweets.index', ['tag_name' => $tag->tag_name]) }}" class="btn btn-outline-success m-1">
                    {{ $tag->tag_name }}
                </a>
            @endforeach
        </div>
        <div class="col-sm-9">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @foreach ($tweets as $tweet)
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="mr-auto">
                        <a href="{{ route('users.show', $tweet->user_id) }}" class="btn btn-outline-primary btn-sm">{{ "@".$tweet->user->name }}</a>
                        が
                        <span class="text-muted" style="font-size:15px;">{{ $tweet->created_at->format('Y年m月d日')  }}にストック</span>
                    </strong>
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
                    <a href="{{ route('tweets.show', $tweet->id) }}" class="text-dark">
                        <h2 class="card-title">{{ $tweet->title }}</h2>
                    </a>
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
</div>
@endsection

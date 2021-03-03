@extends('layouts.app')

@section('content')
<h2 class="card-header" style="text-align: center;">投稿編集</h2>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tweets.update') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">タイトル(必須)</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{ $tweet->title }}">
        </div>
        <div class="form-group">
          <label for="tags">タグ(5個以下)</label>
          <input id="tags" name="tag_box" class="form-control" type="text" value="{{ $tweet->tag_box }}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">写真（任意）</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" >
        </div>
        <div class="form-group">
          <label for="comment">内容(必須)</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="15">{{$tweet->content}}</textarea>
        </div>

        <input name="tweet_id" type="hidden" value="{{$tweet->id}}">
        <input type="hidden" name="user_id" value="{{ $tweet->user_id }}">


        <input class="btn btn-primary" type="submit" value="変更">
    </form>
</div>
@endsection

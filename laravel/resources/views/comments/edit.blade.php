@extends('layouts.app')

@section('content')
<div class="card-header">comment</div>
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
    <form action="{{ route('comments.update') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" id="comment" name="comment">{{$comment->comment}}</textarea>
        </div>

        <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        <input type="hidden" name="tweet_id" value="{{ $comment->tweet_id }}">
        <input class="btn btn-primary" type="submit" value="変更">
        <button type="submit" name="action" value="back" class="btn btn-primary">戻る</button>
    </form>
</div>
@endsection

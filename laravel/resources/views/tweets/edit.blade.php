@extends('layouts.app')

@section('content')
<div class="card-header">Board</div>
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
          <label for="comment">Comment:</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="5">{{$tweet->content}}</textarea>
        </div>

        <input name="tweet_id" type="hidden" value="{{$tweet->id}}">


        <input class="btn btn-primary" type="submit" value="変更する">
    </form>
</div>
@endsection
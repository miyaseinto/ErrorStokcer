@extends('layouts.app')

@section('content')

<h2 class="card-header" style="text-align: center;">エラー状態について</h2>
<div class="card-body">

  <div class="shadow p-3 mb-5 alert alert-danger" role="alert">
      <h1 class="text-center">{{$tag_view}}</h1>
  </div>
  <div class="text-right">
    <a class="btn btn-outline-success" href="{{ route('tweets.create') }}">
      <span class="text-center mx-5">戻  る</span>
    </a>
  </div>
</div>

@endsection
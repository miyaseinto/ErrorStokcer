@extends('layouts.app')

@section('content')

<div class="card-body">
  <div class="container">
    <div class="row">
          <div class="col-md-6">
          <h2>検索フォーム</h2>
              <div id="custom-search-input">
                  <div class="input-group col-md-12">
                      <form >
                          {{ csrf_field() }}
                          <input type="text" class="form-control input-lg" placeholder="Buscar" >
                          <span class="input-group-btn" style="position: relative;top: -42px;right: -200px;">
                              <button class="btn btn-info btn-lg" type="submit">
                                <i class="fas fa-search"></i>
                              </button>
                          </span>
                      </form>
                  </div>
              </div>
          </div>
    </div>
  </div>
</div>
<div class="card-header"></div>


<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @foreach ($tweets as $tweet)
      <div class="card">
        <div class="card-body">

          <h5 class="card-title">
              投稿者：
              <a href="#">{{ $tweet->user->name }}</a>
          </h5>
          <p class="card-text">{{ $tweet->content }}</p>
          <a href="{{ route('tweets.show', $tweet->id) }}" class="btn btn-primary">詳細</a>
          @auth
            <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                {{ csrf_field() }}
                <input type="submit" value="削除" class="btn btn-danger" style="position: relative;top: -37px;right: -60px;" >
            </form>
          @endauth
        </div>
      </div>
    @endforeach
</div>
@endsection

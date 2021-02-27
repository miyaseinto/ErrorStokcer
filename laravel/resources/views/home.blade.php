
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ErrorStocker') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<main role="main">

    <div class="jumbotron" style="position: relative; height: 70vh; min-height: 300px; background: url(../storage/image/main.jpg) no-repeat center center; background-size: cover;">
        <div class="text-left" style="position: relative; top: 50%; transform: translateY(-50%)">
            <span class= "text-center" style="color: #55c500; font-size:50px;">ErrorStocker!</span>
        </div>
    </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2>ErrorStockerとは??</h2>
        <p>ErrorStockerとは、文字通りエラーを保存する為のアプリケーションです。『一度エラーが生じた際に、ネットから情報を探してきて解決に導く』この作業を短縮できればより多くのタスクをこなすことができると考えました。一度経験した、エラーや勉強した内容を一つの場所に集めておけば見直すことができるので、それを形にしたものです。</p>
      </div>
      <div class="col-md-4">
        <h2>使用方法</h2>
        <p>閲覧用とログインして使用できる２パターンがあります。閲覧用は、閲覧Buttonをクリックすると使用できます。ただ、投稿することはできません。投稿する場合はログインしてからしかできません。投稿をする際は、タイトル・タグ（任意）・写真（任意）・内容を投稿することができます。内容を記述する際は、markdown記法で投稿できるようにしてます。</p>
      </div>
      <div class="col-md-4">
        @if(Auth::user() == Null)
          @if (Route::has('login'))
              <a class="btn btn-outline-success btn-lg btn-block" href="{{ route('login') }}">{{ __('ログイン') }}</a>
          @endif
          @if (Route::has('register'))
              <a class="btn btn-outline-success btn-lg btn-block" href="{{ route('register') }}">{{ __('新規登録') }}</a>
          @endif
              <a class="btn btn-outline-success btn-lg btn-block" href="{{ route('login.guest') }}">{{ __('閲覧用') }}</a>
        @else
          <p>現在ログインされている状態ですので、下記に従ってログアウトしてください。</p>
          <a class="btn btn-outline-success btn-lg btn-block" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
              {{ __('ログアウト') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        @endif
      </div>
    </div>


    <hr>

  </div>
  

</main>
</body>


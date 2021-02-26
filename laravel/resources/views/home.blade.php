
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

  <div class="jumbotron" style="background-color: #55c500;">
    <div class="container">
      <a class="display-3" href="{{ url('/') }}" style="color: #ffffff; font-family:'arial black'; border:none;">
        {{ config('app.name', 'ErrorStocker!') }}
      </a>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2>ErrorStockerとは??</h2>
        <p>吾輩は猫である。名前はまだ無い。どこで生れたかとんと見当がつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。吾輩はここで始めて人間というものを見た。</p>
        <p><a class="btn btn-secondary" href="#" role="button">詳しくみる &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>見出し</h2>
        <p>吾輩は猫である。名前はまだ無い。どこで生れたかとんと見当がつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。吾輩はここで始めて人間というものを見た。</p>
        <p><a class="btn btn-secondary" href="#" role="button">詳しくみる &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>見出し</h2>
        <p>吾輩は猫である。名前はまだ無い。どこで生れたかとんと見当がつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。吾輩はここで始めて人間というものを見た。</p>
        <p><a class="btn btn-secondary" href="#" role="button">詳しくみる &raquo</a></p>
      </div>
    </div>

    <hr>

  </div>

</main>
</body>


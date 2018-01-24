<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Tags -->
    <title>@yield('title') &ndash; {{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="@yield('description')">

    <!-- Stylesheets -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('css/app.css') }}?time={{ \Carbon\Carbon::now()->timestamp }}" rel="stylesheet">

    <!--
     /$$       /$$   /$$                                            
    | $$      |__/  | $$                                            
    | $$$$$$$  /$$ /$$$$$$    /$$$$$$$  /$$$$$$   /$$$$$$  /$$$$$$$ 
    | $$__  $$| $$|_  $$_/   /$$_____/ /$$__  $$ /$$__  $$| $$__  $$
    | $$  \ $$| $$  | $$    | $$      | $$  \ $$| $$  \__/| $$  \ $$
    | $$  | $$| $$  | $$ /$$| $$      | $$  | $$| $$      | $$  | $$
    | $$$$$$$/| $$  |  $$$$/|  $$$$$$$|  $$$$$$/| $$      | $$  | $$
    |_______/ |__/   \___/   \_______/ \______/ |__/      |__/  |__/
    -->
</head>
<body>
<div id="app">
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Bitcorns.com is an idle game of accumulation, similar to AdVenture Capitalist or Cookie Clicker, where the only objective is to accumulate BITCORN. To do so, you need CROPS. Over time, farmers regularly receive BITCORN rewards proportional to the number of CROPS they farm. And that's it. That's the game.</p>
            </div>
            <div class="col-sm-4 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="{{ env('TELEGRAM') }}" class="text-white" target="_blank">Telegram</a></li>
                <li><a href="{{ env('TWITTER') }}" class="text-white" target="_blank">Twitter</a></li>
                <li><a href="mailto:{{ env('EMAIL') }}" class="text-white">E-mail</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark navbar-expand bg-dark">
        <div class="container d-flex justify-content-between">
          <a href="{{ url('/') }}" class="navbar-brand">&#x1f33d; <span class="d-none d-sm-inline">{{ config('app.name', 'Laravel') }}</span></a>
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item d-none d-sm-inline">
                <a class="nav-link" href="{{ url(route('home')) }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url(route('farms.index')) }}">Farms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url(route('pages.ico')) }}">ICO</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ url(route('pages.faq')) }}" id="almanac_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                <div class="dropdown-menu" aria-labelledby="almanac_dropdown">
                  <a class="dropdown-item" href="{{ url(route('pages.almanac')) }}">Farmers' Almanac</a>
                  <a class="dropdown-item" href="https://medium.com/@BitcornCrops" target="_blank">News &amp; Updates</a>
                </div>
              </li>
            </ul>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">
      @yield('content')
    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#" class="d-none d-sm-inline">Back to top</a>
        </p>
        <p>Check out our <a href="{{ env('GITHUB') }}" target="_blank">Github</a> and read the <a href="{{ url(route('pages.faq')) }}">FAQ page</a>.</p>
      </div>
    </footer>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112477384-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112477384-4');
</script>
</body>
</html>

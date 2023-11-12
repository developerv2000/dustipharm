<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="manifest" href="{{ asset('manifest.json') }}">
  <meta name="msapplication-config" content="{{ asset('msapplication-config.xml') }}">

  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/icons/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png') }}">

  {{-- COnfig Safari browser --}}
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/icons/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/icons/apple-icon-167x167.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/apple-icon-180x180.png') }}">

  {{-- Hide Safari User Interface Components & Change status bar color --}}
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#1BA1A0">

  <title>@hasSection('title')@yield('title'){{ ' — Дусти Фарма' }}@else{{ 'Дусти Фарма' }}@endif</title>

  {{-- Noindex --}}
  <meta name="robots" content="none" />
  <meta name="googlebot" content="noindex, nofollow" />
  <meta name="yandex" content="none">

  <meta property="og:site_name" content="Дусти Фарма">
  <meta property="og:type" content="object">
  <meta name="twitter:card" content="summary_large_image">

  @hasSection ('meta-tags')
  @yield('meta-tags')
  @else
  <meta name="description"
    content="Дусти Фарма занимается дистрибьюцией импортных лекарственных средств, последовательно расширяя свою сеть оптовых и розничных аптек, а также распространяя лекарственные препараты через другие аптеки страны.">
  <meta property="og:title" content="Дусти Фарма">
  <meta property="og:description"
    content="Дусти Фарма занимается дистрибьюцией импортных лекарственных средств, последовательно расширяя свою сеть оптовых и розничных аптек, а также распространяя лекарственные препараты через другие аптеки страны.">
  <meta property="og:image" content="{{ asset('img/main/logo-share.png') }}">
  <meta property="og:image:alt" content="Дусти Фарма logo">
  @endif

  {{-- Source sans pro Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700&display=swap">

  {{-- Material Icons --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons">

  {{-- Normalize CSS --}}
  <link rel="stylesheet" href="{{ asset('plugins/normalize.css') }}">

  {{-- Owl Carousel 2.3.4 --}}
  <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.theme.default.min.css') }}">

  {{--
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/media.css') }}"> --}}

  {{-- App bundled stlyes --}}
  @vite('public/css/main.css')
  @vite('public/css/media.css')
</head>

<body>
  @include('layouts.header')
  <main class="main @isset($pageClass){{ $pageClass }}@endisset">
    @yield('main')
  </main>
  @include('layouts.footer')

  {{-- JQuery --}}
  <script src="{{ asset('plugins/jquery-3.6.0.min.js') }}"></script>

  {{-- Owl Carousel 2.3.4 --}}
  <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>

  {{-- Yandex Map --}}
  <script script src="https://api-maps.yandex.ru/2.1/?apikey=33a7de30-2310-4469-8b08-d11b5c952eca&lang=ru_RU"></script>

  {{-- <script src="{{ asset('js/main.js') }}"></script> --}}

  {{-- App bundled scripts --}}
  @vite('public/js/main.js')
</body>

</html>

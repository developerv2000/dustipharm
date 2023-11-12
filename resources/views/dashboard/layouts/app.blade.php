<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Админка — {{ env('APP_NAME') }}</title>

  <link rel="icon" type="image/png" href="/favicon.ico">

  {{-- Noindex --}}
  <meta name="robots" content="none" />
  <meta name="googlebot" content="noindex, nofollow" />
  <meta name="yandex" content="none">

  {{-- Roboto Google fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap">

  {{-- Material Icons --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined">

  {{-- Bootstrap 5.3 --}}
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">

  {{-- Selectize 0.13.3 --}}
  <link rel="stylesheet" href="{{ asset('plugins/selectize/selectize.css') }}">

  {{-- Simditor v2.3.28 --}}
  <link rel="stylesheet" href="{{ asset('plugins/simditor/simditor.css') }}">

  {{-- Normalize CSS --}}
  <link rel="stylesheet" href="{{ asset('plugins/normalize.css') }}">

  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body class="body">
  @include('dashboard.layouts.header')
  @include('dashboard.layouts.aside')

  <main class="main">
    @include('dashboard.components.spinner')
    @include('dashboard.layouts.errors')
    @yield('main')
  </main>

  {{-- JQuery 3.6 --}}
  <script src="{{ asset('plugins/jquery-3.6.0.min.js') }}"></script>

  {{-- Boostrap 5.3 --}}
  <script src="{{ asset('plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>

  {{-- Selectize 0.13.3 --}}
  <script src="{{ asset('plugins/selectize/selectize.min.js') }}"></script>

  {{-- Simditor v2.3.28 --}}
  <script src="{{ asset('plugins/simditor/module.js') }}"></script>
  <script src="{{ asset('plugins/simditor/hotkeys.js') }}"></script>
  <script src="{{ asset('plugins/simditor/uploader.js') }}"></script>
  <script src="{{ asset('plugins/simditor/simditor.js') }}"></script>

  <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>

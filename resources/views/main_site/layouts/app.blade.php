{{--
  resources/views/main_site/layouts/app.blade.php
  Master layout — har page @extends('main_site.layouts.app') karega
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="@yield('meta_desc', 'Kranti Computer — Leading IT Education Institute in Prayagraj')">

  <title>@yield('title', 'Home') | Kranti Computer</title>

  {{-- Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- 1. KC Core — navbar, footer, buttons, variables --}}
  <link rel="stylesheet" href="{{ asset('css/main_site/kc-main.css') }}">

  {{-- 2. MS Core — sections, hero, cards, grids, forms --}}
  <link rel="stylesheet" href="{{ asset('css/main_site/ms-main.css') }}">

  {{-- 3. MS Styles — filter tabs, modal, news ticker --}}
  <link rel="stylesheet" href="{{ asset('css/main_site/ms-styles.css') }}">

  {{-- 4. KC Flash — notification system --}}
  <link rel="stylesheet" href="{{ asset('css/main_site/kc-flash.css') }}">

  {{-- 5. Swiper CSS --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

  {{-- 6. Page specific styles --}}
  @stack('styles')
</head>
<body>

  {{-- Header --}}
  @include('main_site.partials.header')

  {{-- Page Content --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('main_site.partials.footer')

  {{-- Navbar JS --}}
  <script src="{{ asset('js/main_site/kc-navbar.js') }}"></script>

  {{-- KC Flash JS — notification engine --}}
  <script src="{{ asset('js/main_site/kc-flash.js') }}"></script>

  {{-- Swiper JS --}}
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  {{-- Flash partial — session messages auto show --}}
  @include('main_site.partials.flash')

  {{-- Page specific scripts --}}
  @stack('scripts')

</body>
</html>
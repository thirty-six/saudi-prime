<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/manifest.json')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title', 'Saudi Prime')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body dir="rtl">

    {{-- HEADER --}}
    <!--<header class="bg-sand/25 shadow-soft px-app-lg py-app-md flex justify-between items-center">
        <a href="/" class="text-title font-semibold text-deep">
            {{-- Logo --}}
            {{-- {{ config('app.name') }} --}}
            <img src="{{ asset('img/logo-temp.png') }}" alt="{{ config('app.name') }} Logo" class="inline-block size-16 ml-2 align-middle"/>
        </a>

        <nav class="flex items-center gap-app-md text-body">
            <a href="/register" class="text-forest hover:text-deep transition">{{ __('Register') }}</a>
            <a href="/booking" class="text-forest hover:text-deep transition">{{ __('Booking') }}</a>
            <a href="/contact" class="text-forest hover:text-deep transition">{{ __('Contact') }}</a>
        </nav>
    </header>-->

    {{-- MAIN snap-y snap-mandatory  overflow-y-scroll no-scrollbar--}}
    <main class="min-h-screen">
        @yield('content')
    </main>
    {{-- FOOTER --}}
    <footer class="bg-forest text-white py-app-md">
        <div class="max-w-4xl mx-auto px-app-lg text-small">
            <p class="text-small">&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved') }}.</p>
        </div>
    </footer>


</body>
</html>

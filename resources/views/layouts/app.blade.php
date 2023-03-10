<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ !empty($setting) ? $setting->title : 'Haweb.vn' }}</title>
    <meta name="keyword" content="{{ !empty($setting) ? $setting->keyword : '' }}" />
    <meta name="description" content="{{ !empty($setting) ? $setting->description : '' }}" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="app">
        @include('layouts.navigation')
        <main class="py-4">
            @guest
            @else
                @yield('traffice')
                @include('layouts.alert')
            @endguest
            @yield('content')
        </main>
    </div>
    @yield('js')
    <script src="{{ asset('js/base.js') }}"></script>
</body>

</html>

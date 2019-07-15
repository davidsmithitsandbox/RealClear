<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RealClear</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.stylesheets')
    @include('layouts.scripts')
</head>

<body>

    {{-- The id of this div is the mounting for Vue components --}}
    <div id="app">
        @include('layouts.nav_top')
        @yield('content')
    </div>

    {{-- I used cdns for simplicity for the purposes of this project --}}
    @include('layouts.js_scripts')

</body>
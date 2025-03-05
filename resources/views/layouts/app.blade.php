<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ getDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/js/app.js'])
    @include('layouts.partials.style')
    @stack('css')

</head>

<body>
    <div class="page">
        <!-- Sidebar -->
        @include('layouts.partials.sidebar')

        <div class="page-wrapper">
            <!-- Header -->
            @include('layouts.partials.header')

            <div class="page-body">
                @yield('content')
            </div>

            <!-- Footer -->
            @include('layouts.partials.footer')
        </div>
    </div>
    @include('layouts.partials.script')
    @stack('js')
</body>

</html>

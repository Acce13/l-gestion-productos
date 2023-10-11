<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Product Management | @yield('title')</title>
        <!-- bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- bootstrap CSS -->
        <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- select2 CSS -->
        <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet">
        <!-- Styles CSS -->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    </head>
    <body>

        @auth
            @include('layouts.partials.navbar')
        @endauth

        @yield('content')
        <!-- Jquery -->
        <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
        <!-- bootstrap JS -->
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <!-- select2 JS -->
        <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
        
        @stack('scripts')
    </body>
</html>

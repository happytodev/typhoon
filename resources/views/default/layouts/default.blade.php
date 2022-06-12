<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{  config('typhoon.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body class="antialiased">
        {{-- Add header --}}
        @include('typhoon::' . config('typhoon.template') . '.partials.header')

        <div class="container mx-auto px-5 py-24">
            @yield('content')
        </div>
    </body>
</html>
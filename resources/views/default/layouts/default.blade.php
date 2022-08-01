<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('typhoon.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind-Elements PART 1 --}}
    {{-- https://tailwind-elements.com/quick-start/ --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script> --}}
    {{-- Tailwind-Elements PART 1 --> END --}}
    
    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    @livewireStyles
    
</head>

<body class="flex flex-col min-h-screen antialiased ext-webkit ext-chrome ext-mac">
    {{-- Add header --}}
    @include('typhoon::' . config('typhoon.template') . '.partials.header')
    
    {{-- <div class="container mx-auto px-5 py-24"> --}}
        <div class="bg-gray-50 flex flex-col flex-grow">
            @yield('content')
        </div>
        
    @include('typhoon::' . config('typhoon.template') . '.partials.footer')
    
    {{-- Tailwind-Elements PART 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    {{-- Tailwind-Elements PART 2 --> END --}}

    @livewireScripts
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('typhoon.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/prism.css" />
    <link rel="stylesheet" href="/vendor/filament-tailwind-color-picker/ftcp.css" />
    @livewireStyles

    {{-- AlpineJS --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="/js/lazysizes.min.js" async=""></script>
    
</head>

<body class="flex flex-col min-h-screen antialiased ext-webkit ext-chrome ext-mac">
    {{-- Add header --}}
    @include('typhoon::' . config('typhoon.template') . '.partials.header')
    
    {{-- <div class="container mx-auto px-5 py-24"> --}}
        <div class="bg-gray-50 flex flex-col grow-0">
            @yield('content')
        </div>
     

        <x-flash />

    @include('typhoon::' . config('typhoon.template') . '.partials.footer')
    
    <script src="/js/prism.js"></script>

    {{-- Tips from https://css-tricks.com/fluid-width-video/ --}}
    <script defer>
        (function(window, document, undefined) {
            "use strict";

            // List of Video Vendors embeds you want to support
            var players = ['iframe[src*="youtube.com"]', 'iframe[src*="vimeo.com"]'];

            // Select videos
            var fitVids = document.querySelectorAll(players.join(","));

            // If there are videos on the page...
            if (fitVids.length) {
                // Loop through videos
                for (var i = 0; i < fitVids.length; i++) {
                    // Get Video Information
                    var fitVid = fitVids[i];
                    var width = fitVid.getAttribute("width");
                    var height = fitVid.getAttribute("height");
                    var aspectRatio = height / width;
                    var parentDiv = fitVid.parentNode;

                    // Wrap it in a DIV
                    var div = document.createElement("div");
                    div.className = "fitVids-wrapper";
                    div.style.paddingBottom = aspectRatio * 100 + "%";
                    parentDiv.insertBefore(div, fitVid);
                    fitVid.remove();
                    div.appendChild(fitVid);

                    // Clear height/width from fitVid
                    fitVid.removeAttribute("height");
                    fitVid.removeAttribute("width");
                }
            }
        })(window, document);
    </script>


    @livewireScripts

</body>

</html>

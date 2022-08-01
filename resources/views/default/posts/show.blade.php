@extends('typhoon::' . config('typhoon.template') . '.layouts.default')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-col">
            <div class="lg:w-4/6 mx-auto">
                <div class="rounded-lg h-full overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full"
                        src="{{ Storage::url($post->main_image) }}">
                </div>
                <div class="flex flex-col mt-10">

                    <div
                        class="prose-sm lg:prose-xl sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 flex-initial">
                        <h2 class="text-4xl">{{ $post->title }}</h2>
                        <p class="leading-relaxed lg:text-lg mb-4">
                            <x-markdown>
                                {{ $post->content }}
                            </x-markdown>
                        </p>
                    </div>

                    {{-- User's Bio --}}
                    {{-- from https://tailwindtemplates.io/templates?category=profile --}}
                    <div class="p-16">
                        <div class="p-8 bg-white shadow mt-24">
                            <div class="grid grid-cols-1 md:grid-cols-3">
                                <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                                    {{-- Not used now 
                                    <div>
                                        <p class="font-bold text-gray-700 text-xl">22</p>
                                        <p class="text-gray-400">Friends</p>
                                    </div> --}}
                                    <div>
                                        <p class="font-bold text-gray-700 text-xl">{{ $post->user->posts()->count() }}</p>
                                        <p class="text-gray-400">Posts</p>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-700 text-xl">{{ $post->user->comments()->count() }}</p>
                                        <p class="text-gray-400">Comments</p>
                                    </div>
                                </div>
                                <div class="relative">
                                    <div
                                        class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                                        @if ($post->user->picture)
                                        <img src="{{ Storage::url($post->user->picture) }}" alt="{{ $post->user->name }} picture"
                                            class="rounded-full w-48 h-48">
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        @endif 
                                    </div>
                                </div>
                                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                                    {{-- Not used now
                                    <button
                                        class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                        Connect
                                    </button> 
                                    <button
                                        class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                        Message
                                    </button>  --}}
                                </div>
                            </div>
                            <div class="mt-20 text-center border-b pb-12">
                                <h1 class="text-4xl font-medium text-gray-700">{{ $post->user->name }}</h1>
                                {{-- Not used now 
                                <p class="font-light text-gray-600 mt-3">Bucharest, Romania</p>
                                <p class="mt-8 text-gray-500">Solution Manager - Creative Tim Officer</p>
                                <p class="mt-2 text-gray-500">University of Computer Science</p> --}}
                            </div>
                            <div class="mt-12 flex flex-col justify-center prose-sm lg:prose-xl">
                                <p class="text-gray-600 text-center font-light lg:px-16">
                                    <x-markdown>
                                        {{ $post->user->bio }}
                                    </x-markdown>
                                </p> 
                                {{-- <button
                                    class="text-indigo-500 py-2 px-4  font-medium mt-4"> Show more
                                </button> --}}
                            </div>
                        </div>
                    </div>

                    {{-- Post's comments --}}
                    <x-filament-comments :post="$post" />
                </div>
            </div>
        </div>
    </section>





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
@endsection

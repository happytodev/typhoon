@extends('typhoon::' . config('typhoon.template') . '.layouts.default')

@section('content')
{{-- @dump($post) --}}
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-col">
            <div class="lg:w-4/6 mx-auto">
                <div class="rounded-lg h-full overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full" src="{{ Storage::url($post->main_image) }}">
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
                        {{-- <a class="text-indigo-500 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a> --}}
                    </div>
                    
                    {{-- User's Bio --}}
                    <div class="prose-sm lg:prose-xl text-center sm:pr-8 sm:py-8 border border-1 border-dashed p-4 shadow-2xl bg-gray-100 mt-4 rounded-xl">
                        <div
                            class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                            @if($post->user->picture)
                                <img src="{{ Storage::url($post->user->picture) }}" alt="{{ $post->user->name }} picture" class="rounded-full">
                            @else
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            @endif
                        </div>
                        <div class="flex flex-col items-center text-center justify-center">
                            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $post->user->name }}</h2>
                            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                            <div class="leading-relaxed text-base text-justify mb-4">
                                <x-markdown>
                                    {{ $post->user->bio }}
                                </x-markdown>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    {{-- @if ($post === null)
        <h1>No post with this id, sorry</h1>
    @else
        <h1>{{ $post->title }}</h1>

        <p> {{ $post->content }}</p>

        <p>By
            <a href="mailto:{{ $post->user->email }}">
                {{ $post->user->name }}
            </a>
        </p>

        <p>
            Other posts by {{ $post->user->name }} : {{ $post->user->posts->count() - 1 }}
        <ul>
            @forelse ($post->user->posts as $userpost)
                // If user post is the same than post in this page, 
                // don't show it
                @if ($userpost->title != $post->title)
                    <li>
                        <a href="/posts/{{ $userpost->id }}">
                            {{ $userpost->title }}
                        </a>
                    </li>
                @endif
            @empty
                <p>No other post for this user</p>
            @endforelse
        </ul>
        </p>
    @endif
    <a href="/posts">All posts in this blog</a> --}}


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

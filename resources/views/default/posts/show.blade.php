@extends('typhoon::' . config('typhoon.template') . '.layouts.default')

@section('content')
{{-- @dump($post) --}}
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-col">
            <div class="lg:w-4/6 mx-auto">
                <div class="rounded-lg h-full overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full" src="/{{ $post->main_image }}">
                </div>
                <div class="flex flex-col sm:flex-row mt-10">
                    <div class="sm:w-1/4 text-center sm:pr-8 sm:py-8">
                        <div
                            class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="flex flex-col items-center text-center justify-center">
                            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $post->user->name }}</h2>
                            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                            <p class="text-base">Author bio needs to be implemented.</p>
                        </div>
                    </div>
                    <div
                        class="prose sm:w-3/4 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                        <h2 class="text-4xl">{{ $post->title }}</h2>
                        <p class="leading-relaxed text-lg mb-4">
                            <x-markdown>
                            {{ $post->content }}    
                            </x-markdown>
                        </p>
                        <a class="text-indigo-500 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
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

@endsection

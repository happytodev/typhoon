@extends('typhoon::' . config('typhoon.template') . '.layouts.default')

@section('content')

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20 bg-slate-200">
                <x-typhoon-hero />
            </div>
            <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-red-600">Featured Posts</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                <article class="lg:w-1/2 w-full leading-relaxed text-gray-500 py-4 prose"><h1> The posts you probably should read first</h1>
                    tote bag tumblr hexagon   
                    brooklyn
                    asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man
                    bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag."</article>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($featuredPosts as $featuredPost)
                    <x-typhoon-post :post=$featuredPost />
                @empty
                    <p>No featured posts yet</p>
                @endforelse
            </div>
            <div class="flex flex-wrap w-full my-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-red-600">All Posts</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                <article class="lg:w-1/2 w-full leading-relaxed text-gray-500 py-4 prose"><h1> All possible readings</h1>
                    tote bag tumblr hexagon   
                    brooklyn
                    asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man
                    bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag."
                </article>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($allPosts as $post)
                    <x-typhoon-post :post=$post />
                @empty
                    <p>No featured posts yet</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection

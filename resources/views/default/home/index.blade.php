@extends('typhoon::' . config('typhoon.template') . '.layouts.default')

@section('content')

    <section class="text-gray-600 body-font bg-amber-300">
        <div class="md:pt-16 md:grid-rows-1 max-w-screen-2xl grid grid-cols-12 mx-auto">
            {{-- <div class="flex flex-wrap w-full mb-20 bg-slate-200"> --}}
                <x-typhoon-hero />
            {{-- </div> --}}
        </div> 
    </section>
    <section class="bg-slate-100">

        <div class="md:pt-16 md:grid-rows-1 max-w-screen-2xl grid grid-cols-12 mx-auto">
            <div class="col-span-12 lg:col-span-6 w-full mb-6 mt-4 lg:mt-0 lg:mb-0 px-4 lg:px-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-red-600">Featured Posts</h1>
                <div class="h-1 w-20 bg-indigo-500 rounded"></div>
            </div>
            <article class="col-span-12 lg:col-span-6 w-full leading-relaxed text-gray-500 py-4 px-4 lg:px-0 prose"><h1> The posts you probably should read first</h1>
                tote bag tumblr hexagon   
                brooklyn
                asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man
                bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag."
            </article>
        </div>
        <div class="md:pt-16 md:grid-rows-1 max-w-screen-2xl grid grid-cols-12 mx-auto">
            @forelse ($featuredPosts as $featuredPost)
            <x-typhoon-post :post=$featuredPost />
            @empty
            <p>No featured posts yet</p>
            @endforelse
        </div>
    </section>
    <section class="bg-blue-300">
            <div class="md:pt-16 md:grid-rows-1 max-w-screen-2xl grid grid-cols-12 mx-auto">
                <div class="col-span-12 lg:col-span-6 w-full mb-6 mt-4 lg:mt-0 lg:mb-0 px-4 lg:px-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-amber-200">Les derniers articles</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                <article class="col-span-12 lg:col-span-6 w-full leading-relaxed text-gray-500 py-4 px-4 lg:px-0 prose"><h1> All possible readings</h1>
                    tote bag tumblr hexagon   
                    brooklyn
                    asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man
                    bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag."
                </article>
            </div>
            <div class="md:pt-16 md:grid-rows-1 max-w-screen-2xl grid grid-cols-12 mx-auto">
                @forelse ($allPosts as $post)
                    <x-typhoon-post :post=$post />
                @empty
                    <p>No featured posts yet</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection

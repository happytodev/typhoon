@extends('typhoon::' . config('typhoon.template') . '.layouts.default')

@section('content')

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
            <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-red-600">Showing all posts</h1>
                <div class="h-1 w-20 bg-indigo-500 rounded"></div>
            </div>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-500 py-4">Whatever cardigan tote bag tumblr hexagon brooklyn
                asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man
                bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($posts as $post)
                <div class="xl:w-1/4 md:w-1/2 p-4
                transition ease-in-out delay-150 
                hover:-translate-y-1 hover:scale-110 duration-300">
                    <div class="{{ $post->category->bg_color }} rounded-3xl">
                        <a href="/posts/{{ $post->slug }}">
                            <img class="h-40 w-full object-cover rounded-t-3xl object-center mb-6"
                            src="{{ $post->main_image ? $post->main_image :  "https://dummyimage.com/720x400?dummy" }}" alt="content">
                        </a>
                        <div class="p-6">
                            <p class="text-xs pb-2">{{ $post->created_at->diffForHumans() }}</p>
                            <h3 class="tracking-widest {{ $post->category->color }} text-xs font-extrabold font-sans">{{ $post->category->name }}</h3>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $post->title }}</h2>
                            <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery
                                hexagon disrupt edison bulbche.</p>
                            <div class="mt-2">
                                @forelse ($post->tags()->get() as $tag)
                                    <span class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full">
                                        {{ $tag->name }}
                                    </span>
                                @empty
                                    <span class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-gray-700 text-gray-200 rounded-full">
                                        No tag
                                    </span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p> 'No posts yet' </p>
                @endforelse
            </div>
        </section>
        
@endsection
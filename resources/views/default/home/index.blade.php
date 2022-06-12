@extends('typhoon::' . config('typhoon.template') . '.layouts.default')

@section('content')

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
            <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-red-600">Featured</h1>
                <div class="h-1 w-20 bg-indigo-500 rounded"></div>
            </div>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-500 py-4">Whatever cardigan tote bag tumblr hexagon brooklyn
                asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man
                bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($featuredPosts as $featuredPost)
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <a href="/posts/{{ $featuredPost->id }}">
                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                            src="https://dummyimage.com/720x400" alt="content">
                        </a>
                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
                        <div>
                            @forelse ($featuredPost->tags()->get() as $tag)
                                <span class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full">
                                    {{ $tag->name }}
                                </span>
                            @empty
                            <span class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-gray-700 text-gray-200 rounded-full">
                                No tag
                            </span>
                            @endforelse
                        </div>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $featuredPost->title }}</h2>
                        <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery
                            hexagon disrupt edison bulbche.</p>
                        </div>
                    </div>
                    @empty
                    <p> 'No posts yet' </p>
                    @endforelse
                </div>
            </div>
        </section>
        
@endsection
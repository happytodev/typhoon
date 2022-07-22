@extends('typhoon::' . config('typhoon.template') . '.layouts.default')

@section('content')

<div class="col-span-12">

    <section class="text-grey-900 body-font">
        <div class="container mx-auto flex px-5 py-16 md:flex-row flex-col items-center">
            <div class="col-span-12 lg:col-span-6 w-full mb-6 mt-4 lg:mt-0 lg:mb-0 px-4 lg:px-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-red-600">{{ __('posts.showing_all_posts') }}</h1>
                <div class="h-1 w-20 bg-indigo-500 rounded"></div>
            </div>
            <article class="col-span-12 lg:col-span-6 w-full leading-relaxed text-gray-500 py-4 px-4 lg:px-0 prose">
                <x-markdown>
                    {{ __('posts.all_posts_description') }}
                </x-markdown>
            </article>
        </div>
        <div class="col-span-12">
            <div class="container mx-auto px-5 py-16 grid grid-cols-1 md:grid-cols-3 gap-4">
                @forelse ($posts as $post)
                    <x-typhoon-post :post=$post />
                @empty
                    <p>{{ __('posts.no_posts') }}</p>
                @endforelse
            </div>
        </div>
    </section>
</div>

@endsection
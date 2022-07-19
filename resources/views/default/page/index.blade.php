@extends('typhoon::' . config('typhoon.template') . '.layouts.default')


@section('content')
    @foreach ($page->content as $content)
        <section class="text-gray-600 body-font {{ $content['data']['backgroundColor'] ?? 'bg-white' }}">
            <div class="md:pt-8 md:pb-8 md:grid-rows-1 max-w-screen-2xl grid grid-cols-12 md:mx-24 xl:mx-auto">


                {{-- @dd($content) --}}
                @switch($content['type'])
                    @case('heading')
                        <x-typhoon.page.header :type="$content['data']['level']" :content="$content['data']['content']" :width="$content['data']['width']" />
                    @break

                    @case('hero')
                        <x-typhoon.page.hero :heroTitle="$content['data']['heroTitle']" :heroSubtitle="$content['data']['heroSubtitle']" :heroText="$content['data']['heroText']" :heroImage="$content['data']['heroImage']" :heroImagePosition="$content['data']['heroImagePosition']" />
                    @break

                    @case('paragraph')
                        <x-typhoon.page.paragraph :paragraphContent="$content['data']['content']" />
                    @break

                    @case('featured-post')
                        <x-typhoon.page.featured-posts :featuredPostsTitle="$content['data']['featuredPostsTitle']" :featuredPostsDescription="$content['data']['featuredPostsDescription']" :featuredPostsNumber="$content['data']['featuredPostsNumber']" />
                    @break

                    @case('latest-post')
                        <x-typhoon.page.last-posts :latestPostsTitle="$content['data']['latestPostsTitle']" :latestPostsDescription="$content['data']['latestPostsDescription']" :latestPostsNumber="$content['data']['latestPostsNumber']" />
                    @break

                    @case('image')
                        <x-typhoon.page.image :imageUrl="$content['data']['url']" :imageAlt="$content['data']['alt']" :imageBackgroundColor="$content['data']['backgroundColor']" :imageWidth="$content['data']['width']" />
                    @break
                @endswitch

            </div>
        </section>
    @endforeach
@endsection()

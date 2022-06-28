@extends('typhoon::' . config('typhoon.template') . '.layouts.default')


@section('content')
    @foreach ($page->content as $content)
        <section class="text-gray-600 body-font {{ $content['data']['backgroundColor'] }}">
            <div class="md:py-16 md:grid-rows-1 max-w-screen-2xl grid grid-cols-12 mx-auto">


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

                    @case('image')
                        <x-typhoon.page.image :imageUrl="$content['data']['url']" :imageAlt="$content['data']['alt']" :imageBackgroundColor="$content['data']['backgroundColor']" :imageWidth="$content['data']['width']" />
                    @break
                @endswitch

            </div>
        </section>
    @endforeach
@endsection()

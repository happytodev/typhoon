@extends('typhoon::' . config('typhoon.template') . '.layouts.default')


@section('content')
    @foreach ($page->content as $content)
        <section class="text-gray-600 body-font {{ $content['data']['backgroundColor'] ?? 'bg-white' }}">
            
            <div class="
                md:grid-rows-1 
                @if (isset($content['data']['width']) &&  $content['data']['width'] == 'full'))
                    max-w-screen-7xl
                @else
                    md:pt-8 
                    md:pb-8 
                    max-w-screen-2xl
                @endif
                {{-- {{ $content['data']['width'] ?? 'max-w-screen-2xl' }}  --}}
                grid grid-cols-12 
                md:mx-24 xl:mx-auto">
            
            
                @switch($content['type'])
                    @case('heading')
                    @if($content['data']['visible'])
                        <x-typhoon.page.header :type="$content['data']['level']" :content="$content['data']['content']" :width="$content['data']['width']" />
                    @endif
                    @break

                    @case('hero')
                    @if($content['data']['visible'])
                        <x-typhoon.page.hero :heroTitle="$content['data']['heroTitle']" :heroSubtitle="$content['data']['heroSubtitle']" :heroText="$content['data']['heroText']" :heroImage="$content['data']['heroImage']" :heroImagePosition="$content['data']['heroImagePosition']" />
                    @endif
                    @break

                    @case('paragraph')
                    @if($content['data']['visible'])
                        <x-typhoon.page.paragraph :paragraphContent="$content['data']['content']" />
                    @endif
                    @break
    
                    @case('featured-post')
                    @if($content['data']['visible'])
                        <x-typhoon.page.featured-posts :featuredPostsTitle="$content['data']['featuredPostsTitle']" :featuredPostsDescription="$content['data']['featuredPostsDescription']" :featuredPostsNumber="$content['data']['featuredPostsNumber']" />
                    @endif
                    @break

                    @case('latest-post')
                    @if($content['data']['visible'])
                        <x-typhoon.page.last-posts :latestPostsTitle="$content['data']['latestPostsTitle']" :latestPostsDescription="$content['data']['latestPostsDescription']" :latestPostsNumber="$content['data']['latestPostsNumber']" />
                    @endif
                    @break

                    @case('image')
                    @if($content['data']['visible'])
                        <x-typhoon.page.image :imageUrl="$content['data']['url']" :imageAlt="$content['data']['alt']" :imageBackgroundColor="$content['data']['backgroundColor']" :imageWidth="$content['data']['width']" />
                    @endif
                    @break
                @endswitch
            </div>

        </section>
    @endforeach
@endsection()

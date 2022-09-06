@extends('typhoon::' . config('typhoon.template') . '.layouts.default')


@section('content')
    @foreach ($page->content as $content)
        <section class="text-gray-600 body-font {{ $content['data']['backgroundColor'] ?? 'bg-white' }}">
            
            <div class="
                md:grid-rows-1 
                @if ( (isset($content['data']['width']) &&  $content['data']['width'] == 'full') || $content['type'] == 'hero')
                    max-w-screen-7xl
                @else
                    md:pt-8 
                    md:pb-8 
                    max-w-screen-2xl
                    md:mx-24 xl:mx-auto
                @endif
                {{-- {{ $content['data']['width'] ?? 'max-w-screen-2xl' }}  --}}
                grid grid-cols-12">
            
            
                @switch($content['type'])
                    @case('heading')
                    @if($content['data']['visible'])
                        <x-typhoon.page.header :level="$content['data']['level']" :content="$content['data']['content']" :titleColor="$content['data']['titleColor']" :width="$content['data']['width']" />
                    @endif
                    @break

                    @case('hero')
                    @if($content['data']['visible'])
                        <x-typhoon.page.hero 
                            :heroTitle="$content['data']['heroTitle']" 
                            :heroTitleTextSize="$content['data']['heroTitleTextSize']" 
                            :heroSubtitle="$content['data']['heroSubtitle']" 
                            :heroText="$content['data']['heroText']" 
                            :heroImage="$content['data']['heroImage']" 
                            :heroImagePosition="$content['data']['heroImagePosition']" 
                            :titleTextColor="$content['data']['titleTextColor']" 
                            :subtitleTextColor="$content['data']['subtitleTextColor']" 
                            :descriptionTextColor="$content['data']['descriptionTextColor']" 
                            :backgroundColor="$content['data']['backgroundColor']" 
                            :heroHeight="$content['data']['heroHeight']" 
                            :heroArtIcon="$content['data']['heroArtIcon']"
                            :heroArtIconHeight="$content['data']['heroArtIconHeight']"
                            {{-- :heroArtIconWidth="$content['data']['heroArtIconWidth']" --}}
                            :heroArtIconOffsetX="$content['data']['heroArtIconOffsetX']" 
                            {{-- :heroArtIconOffsetY="$content['data']['heroArtIconOffsetY']"  --}}
                            :heroArtIconVisible="$content['data']['heroArtIconVisible']" 
                            :heroArtIconInvertColor="$content['data']['heroArtIconInvertColor']" 
                            :heroArtIconOpacity="$content['data']['heroArtIconOpacity']" 
                            :heroArtIconRotate="$content['data']['heroArtIconRotate']" 
                            :heroArtIconRotateInverse="$content['data']['heroArtIconRotateInverse']" 
                            :heroArtIconRotateAngle="$content['data']['heroArtIconRotateAngle']" 
                            :heroCtaVisible="$content['data']['heroCtaVisible']" 
                            :heroCtaButtonText="$content['data']['heroCtaButtonText']" 
                            :heroCtaButtonBackgroundColor="$content['data']['heroCtaButtonBackgroundColor']" 
                            :heroCtaButtonTextColor="$content['data']['heroCtaButtonTextColor']" 
                            :heroCtaUrl="$content['data']['heroCtaUrl']" 
                            :heroCtaUrlTarget="$content['data']['heroCtaUrlTarget']" 

                        />
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

                    @case('plugins')
                    @if($content['data']['visible'])
                        @php $componentName = 'typhoon.page.' . $content['data']['type'] . '-block'; @endphp
                        <x-dynamic-component :component="$componentName" :id="$content['data']['id']" />
                    @endif
                    @break
                @endswitch
            </div>

        </section>
    @endforeach
@endsection()

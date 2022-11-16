@extends('typhoon::' . config('typhoon.template') . '.layouts.default')


@section('content')
    @foreach ($page->content as $content)
        <section class="text-gray-600 body-font {{ $content['data']['backgroundColor'] ?? 'bg-transparent' }}">
            
            <div class="
                md:grid-rows-1 
                @if ( (isset($content['data']['width']) &&  $content['data']['width'] == 'full') || $content['type'] == 'hero' || $content['type'] == 'separator')
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
                    {{-- @dd($content) --}}
                    @if($content['data']['visible'])
                        <x-typhoon.page.header :level="$content['data']['level']" :content="$content['data']['content']" :titleColor="$content['data']['titleColor']" :width="$content['data']['width']" />
                    @endif
                    @break

                    @case('hero')
                    {{-- @dd($content['data']) --}}
                    @if($content['data']['visible'])
                        <x-typhoon.page.hero 
                            :heroTitle="$content['data']['heroTitle'] ?? '' "  
                            :heroTitleTextSize="$content['data']['heroTitleTextSize'] ?? ''" 
                            :heroSubtitle="$content['data']['heroSubtitle'] ?? '' "  
                            :heroSubtitleTextSize="$content['data']['heroSubtitleTextSize'] ?? '' "  
                            :heroDescription="$content['data']['heroDescription'] ?? '' "  
                            :heroImage="$content['data']['heroImage'] ?? '' "  
                            :heroImagePosition="$content['data']['heroImagePosition'] ?? '' "  
                            :titleTextColor="$content['data']['titleTextColor'] ?? '' "  
                            :subtitleTextColor="$content['data']['subtitleTextColor'] ?? '' "  
                            :descriptionTextColor="$content['data']['descriptionTextColor'] ?? '' "  
                            :backgroundColor="$content['data']['backgroundColor'] ?? '' "  
                            :heroHeight="$content['data']['heroHeight'] ?? '' "  
                            :heroArtIcon="$content['data']['heroArtIcon'] ?? '' " 
                            :heroArtIconHeight="$content['data']['heroArtIconHeight'] ?? '' " 
                            :heroArtIconOffsetX="$content['data']['heroArtIconOffsetX'] ?? '' "  
                            :heroArtIconVisible="$content['data']['heroArtIconVisible'] ?? '' "  
                            :heroArtIconInvertColor="$content['data']['heroArtIconInvertColor'] ?? '' "  
                            :heroArtIconOpacity="$content['data']['heroArtIconOpacity'] ?? '' "  
                            :heroArtIconRotate="$content['data']['heroArtIconRotate'] ?? '' "  
                            :heroArtIconRotateInverse="$content['data']['heroArtIconRotateInverse'] ?? '' "  
                            :heroArtIconRotateAngle="$content['data']['heroArtIconRotateAngle'] ?? '' "      
                            :heroCtaVisible="$content['data']['heroCtaVisible'] ?? '' "  
                            :heroCtaButtonGlowing="$content['data']['heroCtaButtonGlowing'] ?? '' "  
                            :heroCtaButtonText="$content['data']['heroCtaButtonText'] ?? '' "  
                            :heroCtaButtonBackgroundColor="$content['data']['heroCtaButtonBackgroundColor'] ?? '' "  
                            :heroCtaButtonTextColor="$content['data']['heroCtaButtonTextColor'] ?? '' "  
                            :heroCtaButtonPosition="$content['data']['heroCtaButtonPosition'] ?? '' "  
                            :heroCtaUrl="$content['data']['heroCtaUrl'] ?? '' "  
                            :heroCtaUrlTarget="$content['data']['heroCtaUrlTarget'] ?? '' "  
                            :heroBackgroundTextPosition="$content['data']['heroBackgroundTextPosition'] ?? '' "  
                            :heroBackgroundBackdropBrightness="$content['data']['heroBackgroundBackdropBrightness'] ?? '' " 
                            :heroBackgroundBackdropOpacity="$content['data']['heroBackgroundBackdropOpacity'] ?? '' " 
                            :heroBackgroundBackdropInvert="$content['data']['heroBackgroundBackdropInvert'] ?? '' " 
                            :heroBackgroundBackdropColor="$content['data']['heroBackgroundBackdropColor'] ?? '' " 
                            :heroImageBackgroundSize="$content['data']['heroImageBackgroundSize'] ?? '' " 
                            :heroImageBackgroundPosition="$content['data']['heroImageBackgroundPosition'] ?? '' " 
                            :fullwidth="$content['data']['fullwidth'] ?? '' "
                            :heroTitleTextPosition="$content['data']['heroTitleTextPosition'] ?? '' "
                            :heroSubtitleTextPosition="$content['data']['heroSubtitleTextPosition'] ?? '' "
                            :heroDescriptionTextPosition="$content['data']['heroDescriptionTextPosition'] ?? '' "
                        />
                    @endif
                    @break

                    @case('paragraph')
                    @if($content['data']['visible'])
                        <x-typhoon.page.paragraph :paragraphContent="$content['data']['content']" />
                    @endif
                    @break

                    @case('separator')
                    @if($content['data']['visible'])
                        <x-typhoon.page.separator 
                            :separatorType="$content['data']['separatorType']" 
                            :backgroundColor="$content['data']['backgroundColor']"
                            :fillColor1="$content['data']['fillColor1']"
                            :fillColor2="$content['data']['fillColor2']"
                        />
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

@if ($heroImagePosition == 'background')
<div class="col-span-12 {{ $heroHeight == 'content' ? '' : $heroHeight }}" style="background-image: url('{{ Storage::url($heroImage) }}'); background-repeat: no-repeat; background-size: cover;">
    @if($heroArtIconVisible)
    <div class="hidden md:block absolute {{ $heroArtIconOffsetX }} z-0 {{ $heroArtIconRotate ? ( $heroArtIconRotateInverse  ? '-' . $heroArtIconRotateAngle : $heroArtIconRotateAngle )  : '' }}" >
        <img src="{{ Storage::url($heroArtIcon) }}" alt="" class="{{ $heroArtIconHeight }} {{ $heroArtIconInvertColor ? 'invert' : '' }} {{ $heroArtIconOpacity }}">
    </div>
    @endif
    <section class="text-grey-900 body-font">
        <div class="container mx-auto flex px-5 py-16 md:flex-row items-center {{ $heroHeight == 'content' ? '' : $heroHeight }}">
            <div class="lg:flex-grow w-full flex flex-col md:items-start md:text-left md:mb-0 items-center text-center">
                <h1 class="title-font {{ $heroTitleTextSize - 2 > 1 ? 'text-' . $heroTitleTextSize - 2 . 'xl' : 'text-xl' }} sm:{{ 'text-' . $heroTitleTextSize . 'xl'  }}  mb-4 font-medium {{ $titleTextColor }}">{{ $heroTitle }}</h1>
                <h1 class="{{ $heroTitleTextSize - 4 > 0 ? 'text-' . $heroTitleTextSize - 4 . 'xl' : 'text-xl' }} sm:{{ $heroTitleTextSize - 3 > 0 ? 'text-' . $heroTitleTextSize - 3 . 'xl' : 'text-xl'  }} font-thin {{ $subtitleTextColor }}">{{ $heroSubtitle }}</h1>
                <div class="leading-relaxed prose pt-4">
                    <x-markdown class="{{ $descriptionTextColor }}">
                        {{ $heroText }}
                    </x-markdown>
                </div>
                <div>
                    @if ($heroCtaVisible)
                        <a href="{{ $heroCtaUrl }}" target="{{ $heroCtaUrlTarget ? '_blank' : '_self' }}">
                            <button class="flex-shrink-0 {{ $heroCtaButtonTextColor }} {{ $heroCtaButtonBackgroundColor }} border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">{{ $heroCtaButtonText }}</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@else

<div class="col-span-12 relative">
    @if($heroArtIconVisible)
    <div class="hidden md:block absolute {{ $heroArtIconOffsetX }} z-0 {{ $heroArtIconRotate ? ( $heroArtIconRotateInverse  ? '-' . $heroArtIconRotateAngle : $heroArtIconRotateAngle )  : '' }}" >
        <img src="{{ Storage::url($heroArtIcon) }}" alt="" class="{{ $heroArtIconHeight }} {{ $heroArtIconInvertColor ? 'invert' : '' }} {{ $heroArtIconOpacity }}">
    </div>
    @endif
    <section class="text-grey-900 body-font {{ $heroHeight == 'content' ? '' : $heroHeight }}">
        <div class="flex md:flex-row flex-col items-center">
        @if ($heroImagePosition == 'left')
            <div class="md:w-1/2 w-full h-full">
                @if ($heroImage)
                <img class="object-cover w-full object-center lazyload {{ $heroHeight == 'content' ? '' : $heroHeight }}" alt="hero" data-src="{{ Storage::url($heroImage) }}">
                @endif
            </div>            
            <div class="lg:flex-grow md:w-1/2 w-full lg:py-8 md:py-16 flex flex-col md:text-left my-8 md:my-0 items-center text-center z-10">
                <h1 class="title-font {{ $heroTitleTextSize - 2 > 1 ? 'text-' . $heroTitleTextSize - 2 . 'xl' : 'text-xl' }} sm:{{ 'text-' . $heroTitleTextSize . 'xl'  }}  mb-4 font-medium {{ $titleTextColor }}">{{ $heroTitle }}</h1>
                <h1 class="lg:inline-block sm:text-4xl text-3xl  font-thin {{ $subtitleTextColor }}">{{ $heroSubtitle }}</h1>
                <div class="my-2 leading-relaxed prose lg:px-8 md:px-16 pt-4 {{ $descriptionTextColor }}">
                    <x-markdown  class="{{ $descriptionTextColor }}">
                        {{ $heroText }}
                    </x-markdown>
                </div>
                <div>
                    @if ($heroCtaVisible)
                        <a href="{{ $heroCtaUrl }}" target="{{ $heroCtaUrlTarget ? '_blank' : '_self' }}">
                            <button class="flex-shrink-0 {{ $heroCtaButtonTextColor }} {{ $heroCtaButtonBackgroundColor }} border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">{{ $heroCtaButtonText }}</button>
                        </a>
                    @endif
                </div>
            </div>
        @endif
        @if ($heroImagePosition == 'right')
            <div class="lg:flex-grow md:w-1/2 w-full flex flex-col md:items-start md:text-left mb-4 lg:mb-16 md:mb-0 items-center text-center z-10">
                <h1 class="title-font {{ $heroTitleTextSize - 2 > 1 ? 'text-' . $heroTitleTextSize - 2 . 'xl' : 'text-xl' }} sm:{{ 'text-' . $heroTitleTextSize . 'xl'  }}  mb-4 font-medium {{ $titleTextColor }}">{{ $heroTitle }}</h1>
                <h1 class="hidden lg:inline-block sm:text-4xl text-3xl font-thin {{ $subtitleTextColor }}">{{ $heroSubtitle }}</h1>
                <div class="my-2 leading-relaxed prose pt-4">
                    <x-markdown class="{{ $descriptionTextColor }}">
                        {{ $heroText }}
                    </x-markdown>
                </div>
                <div>
                    @if ($heroCtaVisible)
                        <a href="{{ $heroCtaUrl }}" target="{{ $heroCtaUrlTarget ? '_blank' : '_self' }}">
                            <button class="flex-shrink-0 {{ $heroCtaButtonTextColor }} {{ $heroCtaButtonBackgroundColor }} border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">{{ $heroCtaButtonText }}</button>
                        </a>
                    @endif
                </div>
            </div>
            {{-- <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6"> --}}
            <div class="md:w-1/2 w-full">
                @if ($heroImage)    
                <img class="object-cover w-full object-center lazyload {{ $heroHeight == 'content' ? '' : $heroHeight }}" alt="hero" data-src="{{ Storage::url($heroImage) }}">
                @endif
            </div>
        @endif

        </div>
    </section>
</div>

@endif
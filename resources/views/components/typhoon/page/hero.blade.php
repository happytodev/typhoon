@if ($heroImagePosition == 'background')
<div class="col-span-12 {{ $heroHeight == 'content' ? '' : $heroHeight }} {{ $heroImageBackgroundSize ?? '' }} {{ $heroImageBackgroundPosition ?? '' }}" style="background-image: url('{{ Storage::url($heroImage) }}'); background-repeat: no-repeat;">
    @if($heroArtIconVisible)
    <div class="hidden md:block absolute {{ $heroArtIconOffsetX }} z-0 {{ $heroArtIconRotate ? ( $heroArtIconRotateInverse  ? '-' . $heroArtIconRotateAngle : $heroArtIconRotateAngle )  : '' }}" >
        <img src="{{ Storage::url($heroArtIcon) }}" alt="" class="{{ $heroArtIconHeight }} {{ $heroArtIconInvertColor ? 'invert' : '' }} {{ $heroArtIconOpacity }}">
    </div>
    @endif
    <section class="text-grey-900 body-font {{ $fullwidth ?? '' }}">
        <div class="mx-auto flex md:flex-row items-center {{ $heroHeight == 'content' ? '' : $heroHeight }}">
            <div class="lg:flex-grow w-full flex flex-col md:mb-0 {{ $heroBackgroundTextPosition ??  '' }} z-10 {{ $heroBackgroundBackdropBrightness ?? '' }} {{ $heroBackgroundBackdropOpacity ?? '' }} {{ $heroBackgroundBackdropInvert ? 'backdrop-invert' : '' }} {{ $heroBackgroundBackdropColor ?? '' }} h-full justify-center px-4">
                <h1 class="px-2 title-font {{ $heroTitleTextSize - 2 > 1 ? 'text-' . $heroTitleTextSize - 2 . 'xl' : 'text-xl' }} sm:{{ 'text-' . $heroTitleTextSize . 'xl'  }}  mb-4 font-medium {{ $titleTextColor }} {{ $heroTitleTextPosition }}">{{ $heroTitle }}</h1>
                <p class="px-2 {{ $heroSubtitleTextSize }} font-thin {{ $subtitleTextColor }} {{ $heroSubtitleTextPosition }}">{{ $heroSubtitle }}</p>
                <div class="px-2 leading-relaxed prose pt-4 w-full">
                    <x-markdown class="{{ $descriptionTextColor }} {{ $heroDescriptionTextPosition }}">
                        {{ $heroDescription }}
                    </x-markdown>
                </div>
                @if ($heroCtaVisible)
                <div class="flex flex-col w-full {{ $heroCtaButtonPosition }} mb-4">
                        <a href="{{ $heroCtaUrl }}" target="{{ $heroCtaUrlTarget ? '_blank' : '_self' }}">
                            <button class="{{ $heroCtaButtonTextColor }} {{ $heroCtaButtonBackgroundColor }} border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">{{ $heroCtaButtonText }}</button>
                        </a>
                </div>
                @endif
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
    {{-- @dd($fullwidth) --}}
    <section class="text-grey-900 body-font {{ $heroHeight == 'content' ? '' : $heroHeight }} {{ $fullwidth ?? '' }}">
        <div class="flex md:flex-row flex-col items-center">
        @if ($heroImagePosition == 'left')
            <div class="md:w-1/2 w-full h-full">
                @if ($heroImage)
                <img class="object-contain w-full object-center lazyload {{ $heroHeight == 'content' ? '' : $heroHeight }}" alt="hero" data-src="{{ Storage::url($heroImage) }}">
                @endif
            </div>            
            <div class="lg:flex-grow md:w-1/2 w-full flex flex-col items-center text-center z-10">
                <h1 class="px-2 title-font {{ $heroTitleTextSize - 2 > 1 ? 'text-' . $heroTitleTextSize - 2 . 'xl' : 'text-xl' }} sm:{{ 'text-' . $heroTitleTextSize . 'xl'  }}  mb-4 font-medium {{ $titleTextColor }} {{ $heroTitleTextPosition }}">{{ $heroTitle }}</h1>
                <p class="px-2 lg:inline-block {{ $heroSubtitleTextSize }}  font-thin {{ $subtitleTextColor }} {{ $heroSubtitleTextPosition }}">{{ $heroSubtitle }}</p>
                <div class="px-2 my-2 leading-relaxed prose lg:px-8 md:px-16 pt-4 {{ $descriptionTextColor }} w-full">
                    <x-markdown  class="{{ $descriptionTextColor }} {{ $heroDescriptionTextPosition }}">
                        {{ $heroDescription }}
                    </x-markdown>
                </div>
                @if ($heroCtaVisible)

                    @if ($heroCtaButtonGlowing)
                    <div class="px-8 py-4">
                        <div class="grid gap-8 items-start justify-center">
                            <div class="relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt"></div>
                                <a href="{{ $heroCtaUrl }}" target="{{ $heroCtaUrlTarget ? '_blank' : '_self' }}">
                                    <button class="relative px-7 py-4 bg-black rounded-lg leading-none flex items-center divide-x divide-gray-600">
                                        <span class="flex items-center space-x-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-600 -rotate-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                        </svg>
                                        <span class="pr-6 text-gray-100">{{ $heroCtaButtonText }}</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="flex flex-col w-full {{ $heroCtaButtonPosition }} px-8 py-4">
                        <a href="{{ $heroCtaUrl }}" target="{{ $heroCtaUrlTarget ? '_blank' : '_self' }}">
                            <button class="{{ $heroCtaButtonTextColor }} {{ $heroCtaButtonBackgroundColor }} border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">{{ $heroCtaButtonText }}</button>
                        </a>
                    </div>
                    @endif
                @endif
            </div>
        @endif
        @if ($heroImagePosition == 'right')
            <div class="lg:flex-grow md:w-1/2 w-full flex flex-col items-center text-center z-10">
                <h1 class="px-2 title-font {{ $heroTitleTextSize - 2 > 1 ? 'text-' . $heroTitleTextSize - 2 . 'xl' : 'text-xl' }} sm:{{ 'text-' . $heroTitleTextSize . 'xl'  }}  mb-4 font-medium {{ $titleTextColor }} {{ $heroTitleTextPosition }}">{{ $heroTitle }}</h1>
                <p class="px-2 lg:inline-block {{ $heroSubtitleTextSize }} font-thin {{ $subtitleTextColor }} {{ $heroSubtitleTextPosition }}">{{ $heroSubtitle }}</p>
                <div class="px-2 my-2 leading-relaxed prose pt-4 w-full">
                    <x-markdown class="{{ $descriptionTextColor }} {{ $heroDescriptionTextPosition }}">
                        {{ $heroDescription }}
                    </x-markdown>
                </div>
                @if ($heroCtaVisible)
                <div class="flex flex-col w-full {{ $heroCtaButtonPosition }} px-2 mb-4">
                    <a href="{{ $heroCtaUrl }}" target="{{ $heroCtaUrlTarget ? '_blank' : '_self' }}">
                        <button class="{{ $heroCtaButtonTextColor }} {{ $heroCtaButtonBackgroundColor }} border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">{{ $heroCtaButtonText }}</button>
                    </a>
                </div>
                @endif
            </div>

            <div class="md:w-1/2 w-full">
                @if ($heroImage)    
                <img class="object-contain w-full object-center lazyload {{ $heroHeight == 'content' ? '' : $heroHeight }}" alt="hero" data-src="{{ Storage::url($heroImage) }}">
                @endif
            </div>

            <div>
                
            </div>
        @endif

        </div>
    </section>
</div>

@endif
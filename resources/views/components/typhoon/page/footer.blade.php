<div>
    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <img data-src="{{ Storage::url(setting('logo')) }}" alt="{{ config('typhoon.name') }}" class="w-12 lazyload">
                <span class="ml-3 text-xl">{{ config('typhoon.name') }}</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
                @setting('copyright')
            </p>
            @if (setting('disableAllSocialNetworks') == 0)
            <x-happytodev-filament-social-networks name="main"/>
            @endif
        </div>
    </footer>
</div>

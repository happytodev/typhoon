<div>
    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <img src="{{ Storage::url("logo.png") }}" alt="{{ config('typhoon.name') }}" class="w-12">
                <span class="ml-3 text-xl">{{ config('typhoon.name') }}</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
                Made with 🧡 by
                <a href="https://twitter.com/happytodev" class="text-gray-600" rel="noopener noreferrer"
                    target="_blank">@happytodev</a> &
                <a href="https://twitter.com/typhoon" class="text-gray-600" rel="noopener noreferrer"
                    target="_blank">@typhoon</a> — 2022
            </p>
            @if (setting('disableAllSocialNetworks') == 0)
            <x-happytodev-filament-social-networks name="main"/>
            @endif
        </div>
    </footer>
</div>

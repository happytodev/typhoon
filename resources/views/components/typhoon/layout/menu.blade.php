<nav class="{{ setting('menu.bgColor') ?? 'bg-white' }} border-b border-gray-200 {{ setting('menu.sticky') ? 'sticky top-0 z-50 opacity-95' : '' }}">
    {{-- <div class="w-full text-gray-700 max-w-screen container"> --}}
    <div class="w-full text-gray-700 {{ setting('menu.fullwidth') ? 'max-w-screen' : 'mx-auto' }} container">
        <div x-data="{ open: false }" class="flex flex-col mx-auto {{ setting('menu.logoOnTheRight') ? 'lg:flex-row-reverse' : 'lg:flex-row' }}">

            <div class="flex flex-row items-center justify-between px-4 py-2">
                <a href="/"
                    class="text-lg font-semibold tracking-widest text-gray-900 uppercase dark-mode:text-white focus:outline-none focus:shadow-outline">
                    <a href="/"
                        class="flex items-center lg:items-center lg:justify-center title-font font-medium text-gray-900 mb-4 md:mb-0">

                        @if (setting('logo'))
                            <img src="{{ Storage::url(setting('logo')) }}" alt="{{ config('typhoon.name') }}"
                                class="w-12 lazyload">
                            @if (setting('menu.nameAfterLogo'))
                                <span class="ml-3 text-xl">{{ config('typhoon.name') }}</span>
                            @endif
                        @else
                            <span>{{ setting('menu.home.name') ?? 'Home'  }}</span>
                        @endif
                    </a>
                    <span class="sr-only">Home</span>
                </a>

                {{-- Button to show the menu on mobiles --}}
                <button class="mr-8 rounded-lg md:mr-12 lg:hidden focus:outline-none focus:shadow-outline"
                    @click="open = !open">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001" x-show="open"
                        style="display: none;">
                        <path
                            d="M284.286 256.002L506.143 34.144c7.811-7.811 7.811-20.475 0-28.285-7.811-7.81-20.475-7.811-28.285 0L256 227.717 34.143 5.859c-7.811-7.811-20.475-7.811-28.285 0-7.81 7.811-7.811 20.475 0 28.285l221.857 221.857L5.858 477.859c-7.811 7.811-7.811 20.475 0 28.285a19.938 19.938 0 0014.143 5.857 19.94 19.94 0 0014.143-5.857L256 284.287l221.857 221.857c3.905 3.905 9.024 5.857 14.143 5.857s10.237-1.952 14.143-5.857c7.811-7.811 7.811-20.475 0-28.285L284.286 256.002z">
                        </path>
                    </svg>
                    <span class="sr-only" x-show="open" style="display: none;">Close Menu</span><!-- /.sr-only -->

                    <svg class="h-6 w-6" width="40" height="40" viewBox="0 0 100 80" x-show="!open">
                        <path d="M0 0h100v10H0zm0 30h100v10H0zm0 30h100v10H0z"></path>
                    </svg>
                    <span class="sr-only" x-show="!open">Open Menu</span><!-- /.sr-only -->
                </button>
            </div>

            <nav class="flex-col flex-grow hidden h-screen pb-4 lg:pb-0 lg:flex lg:justify-start lg:flex-row lg:h-auto"
                aria-label="Main Navigation" :class="{ 'flex': open, 'hidden': !open }">
                <ul class="flex flex-col flex-wrap pl-0 m-0 lg:flex-row">


                    @foreach ($menu->items as $item)
                        {{-- Children first level --}}
                        @if ($item['children'])

                        <li class="group relative block lg:px-0 xl:px-0 mr-1 py-2"
                            x-data="{ isOpen: false }" @mouseleave="isOpen = false">

                            <a href="#"
                                class="py-2 px-4 group-hover:bg-gray-400 group-hover:text-white"
                                @click="isOpen = !isOpen" x-on:click.prevent="" :class="{ '': isOpen }">

                                {{ $item['label'] }}

                                <svg xmlns="http://www.w3.org/2000/svg" fill="#000" width="16" height="16"
                                    class="hidden lg:inline-block relative top-0 right-0 transform rotate-90"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                    </path>
                                </svg>

                            </a>

                            <ul class="bg-gray-600 p-2" aria-label="submenu" x-show="isOpen"
                            @click.away="isOpen = false" style="display: none;">
                            @foreach ($item['children'] as $children)
                                @if ($children['children'])
                                <li class="group relative border-b border-white border-opacity-[0.2]"
                                x-data="{ isOpen: false }" @mouseleave="isOpen = false">
                                <a href="#" class="py-2 text-white bg-transparent hover:text-gray-100 lg:text-sm"
                                   @click="isOpen = !isOpen" x-on:click.prevent="" :class="{ '': isOpen }">
                                    {{ $children['label'] }}
                                </a>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="16" height="16"
                                    class="hidden lg:inline-block fill-white absolute top-[10px] right-0"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                    </path>
                                </svg>   
                                <ul class="bg-gray-600 p-2" aria-label="submenu" x-show="isOpen"
                                @click.away="isOpen = false" style="display: none;">
                                    @foreach ($children['children'] as $subchildren)
                                    <li class="group relative border-b border-white border-opacity-[0.2]">
                                        <a href="{{ $subchildren['data']['url'] }}"
                                            class="py-2 text-white bg-transparent hover:text-gray-100 lg:text-sm">{{ $subchildren['label'] }}</a>
                                    </li><!-- /.p-3 bg-green-200 -->
                                    
                                    @endforeach 
                                </ul>    
                                @else
                                <li class="group relative border-b border-white border-opacity-[0.2]">
                                    <a href="{{ $children['data']['url'] }}"
                                    class="py-2 text-white bg-transparent hover:text-gray-100 lg:text-sm"
                                    target="{{ $children['data']['target'] != null ? '_blank' : '' }}">
                                        {{ $children['label'] }}
                                    </a>
                                </li><!-- /.p-3 bg-green-200 -->
                                @endif
                            @endforeach

                            </ul>
                        </li>

                        @else

                            <li class="group relative block lg:px-0 xl:px-0 mr-1 py-2">
                                <a href="{{ $item['data']['url'] }}"
                                   class="py-2 px-4 group-hover:bg-gray-400 group-hover:text-white"
                                   target="{{ $item['data']['target'] != null ? '_blank' : '' }}">
                                   {{ $item['label'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</nav>
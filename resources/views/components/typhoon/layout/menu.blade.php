<nav
    class="
  relative
  container
  mx-auto
  w-full
  flex flex-wrap
  items-center
  {{-- justify-between --}}
  py-4
  {{-- bg-gray-100 --}}
  text-gray-500
  hover:text-gray-700
  focus:text-gray-700
  {{-- shadow-lg --}}
  navbar navbar-expand-lg navbar-light
  ">
    <div class="container-fluid w-full flex flex-wrap items-center px-6">
        <button
            class="
      navbar-toggler
      text-gray-500
      border-0
      hover:shadow-none hover:no-underline
      py-2
      px-2.5
      bg-transparent
      focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline
    "
            type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="w-6" role="img"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor"
                    d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                </path>
            </svg>
        </button>
        <div class="collapse navbar-collapse flex flex-row items-center w-full" id="navbarSupportedContent">

            <!-- Left links -->
            <div class="items-center w-1/2 md:w-4/12">
                <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                    @foreach ($menu->items as $item)
                        @if ($item['children'])
                            <div class="dropdown relative p-2">
                                <a class="
                text-gray-500
                hover:text-gray-700
                focus:text-gray-700
                mr-4
                dropdown-toggle
                hidden-arrow
                flex items-center
                "
                                    href="#" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ $item['label'] }}
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down"
                                        class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                                        </path>
                                    </svg>
                                </a>
                                <ul class="
            dropdown-menu
            min-w-max
            absolute
            hidden
            bg-white
            text-base
            z-50
            float-left
            py-2
            list-none
            text-left
            rounded-lg
            shadow-lg
            mt-1
            hidden
            m-0
            bg-clip-padding
            border-none
            left-auto
            right-0
            "
                                    aria-labelledby="dropdownMenuButton1">
                                    @foreach ($item['children'] as $children)
                                        <li>
                                            <a class="
                dropdown-item
                text-sm
                py-2
                px-4
                font-normal
                block
                w-full
                whitespace-nowrap
                bg-transparent
                text-gray-700
                hover:bg-gray-100
                "
                                                href="{{ $children['data']['url'] }}">{{ $children['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <li class="nav-item p-2">
                                <a class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0"
                                    href="{{ $item['data']['url'] }}"
                                    target="{{ $item['data']['target'] != null ? '_blank' : '' }}">
                                    {{ $item['label'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <!-- Left links -->
            </div>
            {{-- Logo centerd --}}



            <div class="hidden md:block md:w-4/12">
                <a href="/"
                    class="
                flex 
                items-center 
                lg:items-center 
                lg:justify-center 
                {{-- order-first 
                lg:order-none 
                lg:w-1/5 --}}
                title-font 
                font-medium 
                text-gray-900 
                mb-4 
                md:mb-0">


                    <img data-src="{{ Storage::url(setting('logo')) }}" alt="{{ config('typhoon.name') }}" class="w-12 lazyload">
                    <span class="ml-3 text-xl">{{ config('typhoon.name') }}</span>
                </a>

            </div>
        </div>
    </div>
</nav>

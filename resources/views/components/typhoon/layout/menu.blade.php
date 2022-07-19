{{-- <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
    @foreach ($menu->items as $item)
        <a href="{{ $item['data']['url'] }}" class="mr-5 hover:text-gray-900"
            target="{{ $item['data']['target'] != null ? '_blank' : '' }}">
            {{ $item['label'] }}
            @if ($item['children'])
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            @endif
        </a>
        @if ($item['children'])
            <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    @foreach ($item['children'] as $children)
                        <a href="{{ $children['data']['url'] }}" class="text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1" id="menu-item-{{ $loop->index }}"
                            target="{{ $children['data']['target'] != null ? '_blank' : '' }}">
                            {{ $children['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
</nav> --}}

{{-- <div class="flex justify-center">
    <div>
        <div class="dropdown relative">
            <button
                class="
            dropdown-toggle
            px-6
            py-2.5
            bg-blue-600
            text-white
            font-medium
            text-xs
            leading-tight
            uppercase
            rounded
            shadow-md
            hover:bg-blue-700 hover:shadow-lg
            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
            active:bg-blue-800 active:shadow-lg active:text-white
            transition
            duration-150
            ease-in-out
            flex
            items-center
            whitespace-nowrap
          "
                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown button
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path fill="currentColor"
                        d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                    </path>
                </svg>
            </button>
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
          "
                aria-labelledby="dropdownMenuButton1">
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
                        href="#">Action</a>
                </li>
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
                        href="#">Another action</a>
                </li>
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
                        href="#">Something else here</a>
                </li>
            </ul>
        </div>
    </div>
</div>

----------- --}}
{{-- <header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <x-typhoon.layout.menu />
      <a class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">{{ config('typhoon.name') }}</span>
      </a>
      <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
        <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Button
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>
    </div>
</header> --}}





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
                <a
                    href="/"
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

                    {{-- https://thenounproject.com/icon/storm-4470730/ --}}
                    {{-- <svg width="700pt" height="700pt" version="1.1" viewBox="0 0 700 700"
                        xmlns="http://www.w3.org/2000/svg" class="w-20 h-20">
                        <g fill-rule="evenodd">
                            <path
                                d="m140 70c0-12.887 10.445-23.332 23.332-23.332h303.34c12.887 0 23.332 10.445 23.332 23.332s-10.445 23.332-23.332 23.332h-303.34c-12.887 0-23.332-10.445-23.332-23.332z" />
                            <path
                                d="m210 140c0-12.887 10.445-23.332 23.332-23.332h303.34c12.887 0 23.332 10.445 23.332 23.332s-10.445 23.332-23.332 23.332h-303.34c-12.887 0-23.332-10.445-23.332-23.332z" />
                            <path
                                d="m256.67 210c0-12.887 10.445-23.332 23.332-23.332h210c12.887 0 23.332 10.445 23.332 23.332s-10.445 23.332-23.332 23.332h-210c-12.887 0-23.332-10.445-23.332-23.332z" />
                            <path
                                d="m210 280c0-12.887 10.445-23.332 23.332-23.332h140c12.887 0 23.336 10.445 23.336 23.332s-10.449 23.332-23.336 23.332h-140c-12.887 0-23.332-10.445-23.332-23.332z" />
                            <path
                                d="m186.67 350c0-12.887 10.445-23.332 23.332-23.332h93.332c12.887 0 23.336 10.445 23.336 23.332s-10.449 23.332-23.336 23.332h-93.332c-12.887 0-23.332-10.445-23.332-23.332z" />
                            <path
                                d="m256.67 420c0-12.887 10.445-23.332 23.332-23.332h70c12.887 0 23.332 10.445 23.332 23.332s-10.445 23.332-23.332 23.332h-70c-12.887 0-23.332-10.445-23.332-23.332z" />
                            <path
                                d="m326.67 490c0-12.887 10.445-23.332 23.332-23.332h23.332c12.887 0 23.336 10.445 23.336 23.332s-10.449 23.332-23.336 23.332h-23.332c-12.887 0-23.332-10.445-23.332-23.332z" />
                        </g>
                    </svg> --}}
                    <img src="{{ Storage::url("randonneur_w512.png") }}" alt="LaraWalks" class="w-12">
                    <span class="ml-3 text-xl">{{ config('typhoon.name') }}</span>
                </a>
                {{-- <a class="
                 flex
                items-center
                lg:items-center lg:justify-center 
                text-gray-900
                hover:text-gray-900
                focus:text-gray-900
                mt-2
                lg:mt-0
                mr-1
                
            "
                    href="#">
                    <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" style="height: 15px"
                        alt="" loading="lazy" />
                </a> --}}
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            {{-- <div class="flex items-center justify-items-end justify-self-end flex-row-reverse w-1/2 md:w-4/12">
                <!-- Icon -->
                <a class="text-gray-500 hover:text-gray-700 focus:text-gray-700 mr-4" href="#">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="w-4"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor"
                            d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z">
                        </path>
                    </svg>
                </a>
                <div class="dropdown relative">
                    <a class="
            text-gray-500
            hover:text-gray-700
            focus:text-gray-700
            mr-4
            dropdown-toggle
            <!-- hidden-arrow -->
            flex items-center
            "
                        href="#" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell" class="w-4"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z">
                            </path>
                        </svg>
                        <span
                            class="text-white bg-red-700 absolute rounded-full text-xs -mt-2.5 ml-2 py-0 px-1.5">1</span>
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
                                href="#">Action</a>
                        </li>
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
                                href="#">Another action</a>
                        </li>
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
                                href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown relative">
                    <a class="dropdown-toggle flex items-center hidden-arrow" href="#" id="dropdownMenuButton2"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-full"
                            style="height: 25px; width: 25px" alt="" loading="lazy" />
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
                        aria-labelledby="dropdownMenuButton2">
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
                                href="#">Action</a>
                        </li>
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
                                href="#">Another action</a>
                        </li>
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
                                href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
            </div> --}}
            <!-- Right elements -->
        </div>
    </div>
</nav>












{{-- <nav class="px-2 bg-white border-gray-200 ">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="#" class="flex items-center">
          <img src="/docs/images/logo.svg" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo">
          <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
      </a>
        <button data-collapse-toggle="mobile-menu" type="button"
            class="inline-flex items-center justify-center ml-3 text-gray-400 rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300"
            aria-controls="mobile-menu-2" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                @foreach ($menu->items as $item)
                    <li>
                        @if ($item['children'])
                            <div class="dropdown relative">
                                <button
                                    class="
                            dropdown-toggle
                            px-6
                            py-2.5
                            bg-blue-600
                            text-gray-600
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-blue-700 hover:shadow-lg
                            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-blue-800 active:shadow-lg active:text-white
                            transition
                            duration-150
                            ease-in-out
                            flex
                            items-center
                            whitespace-nowrap
                          "
                                    type="button" id="dropdownMenuButton{{ $loop->iteration }}"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $item['label'] }}
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                        data-icon="caret-down" class="w-2 ml-2" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                                        </path>
                                    </svg>
                                </button>
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
                          "
                                    aria-labelledby="dropdownMenuButton{{ $loop->iteration }}">
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
                                                href="{{ $children['data']['url'] }}"
                                                target="{{ $item['data']['target'] != null ? '_blank' : '' }}">
                                                {{ $children['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a href="{{ $item['data']['url'] }}"
                                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-gray-600 md:p-0"
                                aria-current="page" target="{{ $item['data']['target'] != null ? '_blank' : '' }}">
                                {{ $item['label'] }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav> --}}

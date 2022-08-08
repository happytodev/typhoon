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
                    <img src="{{ Storage::url(setting('logo')) }}" alt="{{ config('typhoon.name') }}" class="w-12">
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
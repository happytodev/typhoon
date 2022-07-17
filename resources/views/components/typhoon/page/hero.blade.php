<div class="col-span-12">
    <section class="text-grey-900 body-font">
        <div class="container mx-auto flex px-5 py-16 md:flex-row flex-col items-center">
        @if ($heroImagePosition == 'left')
            <div class="md:w-1/2 w-full">
                <img class="object-cover object-center rounded" alt="hero" src="/{{ $heroImage }}">
            </div>            
            <div class="lg:flex-grow md:w-1/2 w-full lg:py-8 md:py-16 flex flex-col md:text-left my-8 md:my-0 items-center text-center md:ml-16">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">{{ $heroTitle }}</h1>
                <h1 class="hidden lg:inline-block sm:text-4xl text-3xl font-thin -mt-4">{{ $heroSubtitle }}</h1>
                <div class="my-8 leading-relaxed prose lg:px-8 md:px-16">
                    <x-markdown>
                        {{ $heroText }}
                    </x-markdown>
                </div>
                {{-- <div class="flex justify-center">
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                </div> --}}
            </div>
            
        @else
            
            <div class="lg:flex-grow md:w-1/2 w-full lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">{{ $heroTitle }}</h1>
                <h1 class="hidden lg:inline-block sm:text-4xl text-3xl font-thin -mt-4">{{ $heroSubtitle }}</h1>
                <p class="my-8 leading-relaxed prose">
                    <x-markdown>
                        {{ $heroText }}</p>
                    </x-markdown>
                {{-- <div class="flex justify-center">
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                </div> --}}
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero" src="/{{ $heroImage }}">
            </div>
        @endif
        </div>
    </section>
</div>
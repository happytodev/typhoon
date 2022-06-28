<div class="col-span-12">
    <section>

        <div class="md:pt-16 md:grid-rows-1 max-w-screen-2xl grid grid-cols-12 mx-auto">
            <div class="col-span-12 lg:col-span-6 w-full mb-6 mt-4 lg:mt-0 lg:mb-0 px-4 lg:px-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-red-600">{{ $featuredPostsTitle }}</h1>
                <div class="h-1 w-20 bg-indigo-500 rounded"></div>
            </div>
            <article class="col-span-12 lg:col-span-6 w-full leading-relaxed text-gray-500 py-4 px-4 lg:px-0 prose">
                <x-markdown>
                    {{ $featuredPostsDescription }}
                </x-markdown>
            </article>
        </div>
        <div class="md:pt-16 md:grid-rows-1 max-w-screen-2xl grid grid-cols-12 mx-auto">
            @forelse ($featuredPostsDataset as $post)
            <x-typhoon-post :post=$post />
            @empty
            <p>No featured posts yet</p>
            @endforelse
        </div>
    </section>
</div>
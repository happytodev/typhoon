<div
    class="p-4 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300">
    <div class="{{ $post->category->bg_color }} rounded-3xl">
        <a href="/posts/{{ $post->slug }}">
            <img class="h-64 object-cover w-full rounded-t-3xl object-center mb-6"
                src="{{ $post->main_image ? Storage::url($post->main_image) : 'https://dummyimage.com/720x400?dummy' }}"
                alt="content">
        </a>
        <div class="px-6 pb-6 prose">
            <div class="flex flex-row">
                <p class="tracking-widest text-black text-xs font-bold">
                    In <span class="
                        inline-flex 
                        items-center 
                        px-3 
                        py-0.5 
                        rounded-full 
                        text-xs 
                        font-bold 
                        leading-5 
                        text-white 
                        font-display 
                        mr-2 
                        capitalize 
                        {{ $post->category->pill_color }}">{{ $post->category->name }}</span>
                </p>
                <p class="tracking-widest text-black text-xs italic py-0.5 leading-5">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            <a href="/posts/{{ $post->slug }}" class="no-underline hover:underline">
                <h1 class="text-gray-900 title-font mb-4">{{ $post->title }}</h1>
            </a>
            <div class="leading-relaxed">
                <x-markdown>
                    {!! Str::limit($post->content, 100) !!}
                </x-markdown>
            </div>
            <div class="mt-2">
                <h3 class="text-xl font-bold">Tags</h3>
                @forelse ($post->tags()->get() as $tag)
                    <span
                        class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full">
                        {{ $tag->name }}
                    </span>
                @empty
                    <span
                        class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-gray-700 text-gray-200 rounded-full">
                        No tag
                    </span>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- 
<div class="col-span-12">

    <section class="text-grey-900 body-font">
        <div class="container mx-auto flex px-5 py-16 md:flex-row flex-col items-center">
            <div class="col-span-12 lg:col-span-6 w-full mb-6 mt-4 lg:mt-0 lg:mb-0 px-4 lg:px-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-red-600">{{ $latestPostsTitle }}</h1>
                <div class="h-1 w-20 bg-indigo-500 rounded"></div>
            </div>
            <article class="col-span-12 lg:col-span-6 w-full leading-relaxed text-gray-500 py-4 px-4 lg:px-0 prose">
                <x-markdown>
                    {{ $latestPostsDescription }}
                </x-markdown>
            </article>
        </div>
        <div class="col-span-12">
            <div class="container mx-auto px-5 py-16 grid grid-cols-3 gap-4">
                @forelse ($latestPostsDataset as $post)
                    <x-typhoon-post :post=$post />
                @empty
                    <p>No latest posts yet</p>
                @endforelse
            </div>
        </div>
    </section>
</div> --}}

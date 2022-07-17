<div
    class="xl:col-span-3 md:col-span-6 col-span-12 p-4
                transition ease-in-out delay-150 
                hover:-translate-y-1 hover:scale-110 duration-300">
    <div class="{{ $post->category->bg_color }} rounded-3xl">
        <a href="/posts/{{ $post->slug }}">
            <img class="h-64 object-cover w-full rounded-t-3xl object-center mb-6"
                src="{{ $post->main_image ? $post->main_image : 'https://dummyimage.com/720x400?dummy' }}"
                alt="content">
        </a>
        <div class="p-6 prose">
            <p class="text-xs">{{ $post->created_at->diffForHumans() }}</p>
            <h3 class="tracking-widest {{ $post->category->color }} text-base font-extrabold font-sans">
                {{ $post->category->name }}</h3>
            <a href="/posts/{{ $post->slug }}" class="no-underline hover:underline">
                <h1 class="text-gray-900 title-font mb-4">{{ $post->title }}</h1>
            </a>
            <div class="leading-relaxed">
                <x-markdown>
                    {!! Str::limit($post->content, 100) !!}
                </x-markdown>
            </div>
            <div class="mt-2">
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

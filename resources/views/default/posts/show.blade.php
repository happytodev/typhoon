<?php //dd( $post); ?>
@if ($post === null)
<h1>No post with this id, sorry</h1>
@else
<h1>{{ $post->title }}</h1>

<p> {{ $post->content }}</p>

<p>By 
    <a href="mailto:{{ $post->user->email }}">
        {{ $post->user->name }}
    </a>
</p>

<p>
    Other posts by {{ $post->user->name }} : {{ $post->user->posts->count() - 1 }}
    <ul>
        @forelse ($post->user->posts as $userpost)
            {{-- If user post is the same than post in this page, 
                don't show it --}}
            @if ($userpost->title != $post->title)
            <li>
                <a href="/posts/{{ $userpost->id }}">
                    {{ $userpost->title }}
                </a>
            </li>
            @endif
        @empty
            <p>No other post for this user</p>
        @endforelse
    </ul>
</p>
@endif
<a href="/posts">All posts in this blog</a>
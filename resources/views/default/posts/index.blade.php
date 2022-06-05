@extends('flat-cms::' . config('flat-cms.template') . '.layouts.default')

@section('content')

<h1>Showing all Posts</h1>

@forelse ($posts as $post)
    <li>
        <a href="/posts/{{ $post->id }}">
            {{ $post->title }}</li>
        </a>
@empty
    <p> 'No posts yet' </p>
@endforelse

@endsection
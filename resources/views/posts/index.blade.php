@extends('layout.app')
@section('title', 'posts')
@section('content')

<div class="father">
<a href="{{ route('posts.create') }}"><button type="button" class="btn btn-primary location">add new post</button></a>
<div class="container">
    @forelse ($posts as $post)
        <a href="{{ route('posts.show', $post->id) }}" class="line"><div class="card">
            <img src="/images/posts/{{ $post->image }}" alt="">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger loc">Delete</button>
                <a href="{{ route('posts.edit', $post->id) }}"><button type="button" class="btn btn-primary loc">Update</button></a>
            </form></div></a>
    @empty
        <h1>There are no posts</h1>
    @endforelse
</div></div>
@endsection



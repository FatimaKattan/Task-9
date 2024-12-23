@extends('layout.app')
@section('title', 'Posts')
@section('content')

    <div class="father">
        <div class="mb-3 pt-4 mm">
            <a href="{{ route('posts.create') }}">
                <button type="button" class="btn btn-primary ml col-up inpp flex_start">
                    <p class="mdi--application-edit-outline mb-0 mr-4"></p>Add New Post
                </button>
                <div class="space_button">
                    <div>
                        <a href="{{ route('users.index') }}">
                            <button type="button" class="btn btn-primary ml col-up inpp flex_start "> 
                                <p class="mdi--account mb-0 mr-4">Users</p>
                                Users</button>
                        </a>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="{{ route('login') }}">
                            {{--         <input type="submit" value="logout" class="btn btn-primary ml col-up inpp flex_start">
    --}} <button type="button"
                                class="btn btn-primary ml col-up inpp flex_start ">
                                <p class="mdi--account-arrow-left mb-0 mr-4"></p>logout</button>
                        </a>
                    </form>
                    {{-- <a href="" class="line-a">language</a>
        <a href="" class="line-a">Login</a>
        <a href="" class="line-a">Logout</a> --}}
                </div>
            </a>
        </div>

        <div class="container justify-content-center">
            <div class="row_f">
                @forelse ($posts as $post)
                    <div class="mb-3">
                        <a href="{{ route('posts.show', $post->id) }}" class="line">
                            <div class="card border-col">
                                <div class="card-body">
                                    <h2 class="card-title col-font-title">{{ $post->title }}</h2>
                                    <p class="card-text col-font">{{ $post->description }}</p>
                                    @php
                                        $images = json_decode($post->images, true);
                                    @endphp
                                    @if ($images)
                                        <div class="post-images">
                                            @foreach ($images as $image)
                                                <img src="{{ asset('images/posts/' . $image) }}" alt="Image for post"
                                                    class="img-fluid mb-2 im">
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-evenly ">
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>
                                        <a href="{{ route('posts.edit', $post->id) }}">
                                            <button type="button" class="btn btn-primary col-up inpp">Update</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <h1 class="text-center">There are no posts</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


@endsection

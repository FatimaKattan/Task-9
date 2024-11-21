@extends('layout.app')
@section('title', 'Edit Post')
@section('content')

<div class="color">
    <h1 class="title">Update Post</h1>
    <br>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control wid" value="{{ $post->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control wid" required>{{ $post->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" class="form-control wid">
            <img src="{{ asset('images/posts/' . $post->image) }}" alt="Current Image" class="loca">
        </div>

        <button type="submit" class="btn btn-primary wid loca">Update Post</button>
    </form>
</div>

@endsection

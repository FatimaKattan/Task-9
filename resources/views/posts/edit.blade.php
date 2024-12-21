@extends('layout.app')
@section('title', 'Edit Post')
@section('content')

<div class="color_edit">
    <h1 class="title col-font-title">Update Post</h1>
    <br>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="color">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="col-font-des">Title:</label>
            <input type="text" id="title" name="title" class="form-control wid border-col inp mb-3" value="{{ $post->title }}" required>
        </div>

        <div class="form-group">
            <label for="description" class="col-font-des">Description:</label>
            <textarea id="description" name="description" class="form-control wid border-col inp mb-4" required>{{ $post->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="images" class="col-font-des">Images:</label>
            <input type="file" id="images" name="new_images[]" class="form-control wid col-font-des border-col inp mb-4" multiple>
            <div class="image-gallery">
                @php
                    $images = json_decode($post->images, true);
                @endphp
                @if ($images)
                    @foreach ($images as $index => $image)
                        <div class="image-wrapper">
                            <img src="{{ asset('images/posts/' . $image) }}" alt="Image for post">
                            <label for="remove_image_{{ $index }}" class="rev">Remove</label>
                            <input type="checkbox" id="remove_image_{{ $index }}" name="remove_images[]" value="{{ $image }}" class="checkbox">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary wid loca col-inp inpp col-up col-upp">Update Post</button>
    </form>
</div>

@endsection

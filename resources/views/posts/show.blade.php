@extends('layout.app')
@section('title', 'post')
@section('content')

<div class="color line inf">
<a href="{{ route('posts.index') }}" ><button type="button" class="btn btn-primary col-up inpp">Back to Home Page</button></a>
<div class="container">
    <div class="">
        <div class="coll">
        <h3 class="text-center">Post Information</h3></div><br>
        <h5>Title is :</h5><br>
        <p>{{ $post->title }}</p><br>
        <h5>Description is :</h5><br>
        <p>{{ $post->description }}</p><br>
        <h5>Profile picture :</h5><br>
        @php
        $images = json_decode($post->images, true);
    @endphp
    @if ($images)
        @foreach ($images as $image)
            <img src="{{ asset('images/posts/' . $image) }}" alt="Image for post">
        @endforeach
    @endif
        <p>added at: {{ $post->created_at }}</p>
    </div>
</div>
</div>
@endsection             
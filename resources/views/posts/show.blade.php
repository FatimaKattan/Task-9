@extends('layout.app')
@section('title', 'post')
@section('content')

<div class="color line inf">
<a href="{{ route('posts.index') }}" ><button type="button" class="btn btn-info">Back to Home Page</button></a>
<div class="container">
    <div class="">
        <h3>The Information</h3><br>
        <h5>Title is :</h5><br>
        <p>{{ $post->title }}</p><br>
        <h5>Description is :</h5><br>
        <p>{{ $post->description }}</p><br>
        <h5>Profile picture :</h5><br>
        <img src="/images/posts/{{ $post->image }}" alt=""><br>
    </div>
</div>
</div>
@endsection

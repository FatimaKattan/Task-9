@extends("layout.app")

@section("title", "add post")

@section("content")
<div class="color">
<h1 class="title">add new post</h1>
<form action="{{ route("posts.store") }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <label for="">title : </label>
    <input type="text" name="title" class="form-control wid" placeholder="post title">
    <label for="">description : </label>
    <textarea name="description" placeholder="post description" class="form-control wid"></textarea>
    <input type="file" name="image" class="form-control wid">
    <input type="submit" value="send">
</form>
</div>
@endsection
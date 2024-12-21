@extends("layout.app")

@section("title", "add post")

@section("content")
<div class="color-create">
<h1 class="title col-font-title">add new post</h1>
<form action="{{ route("posts.store") }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <label for="" class="col-font-des">title : </label>
    <input type="text" name="title" class="form-control wid border-col inp mb-3" placeholder="post title" required>
    <label for="" class="col-font-des">description : </label>
    <textarea name="description"  rows="5" placeholder="post description" class="form-control wid border-col inp mb-4" required></textarea>
    <input type="file" name="images[]" class="form-control wid col-font-des border-col inp mb-4" multiple>
    <input type="submit" value="send post" class="col-up col-inp inpp">
</form>
</div>
@endsection
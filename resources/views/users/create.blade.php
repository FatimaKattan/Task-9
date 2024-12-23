@extends("layout.app")

@section("title", "add user")

@section("content")
<div class="color-create">
<h1 class="title col-font-title">add new user</h1>
<form action="{{ route("users.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="" class="col-font-des">name : </label>
    <input type="text" name="name" class="form-control wid border-col inp mb-3" placeholder="user name" required>
    <label for="" class="col-font-des">email : </label>
    <input type="email" name="email"  placeholder="enter your email" class="form-control wid border-col inp " required></input>
    <label for="" class="col-font-des">Password : </label>
    <input type="password" placeholder="enter your password" name="password" class="form-control wid border-col inp mb-3" required>
    <label for="" class="col-font-des">Confirmed Password : </label>
    <input type="password" placeholder="confirmed password" name="confirme password" class="form-control wid border-col inp mb-3" required>
    <input type="submit" value="send user" class="col-up col-inp inpp">
</form>
</div>
@endsection
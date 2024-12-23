@extends("layout.app")

@section("title" , "login")

@section("content")
<form action="{{ route("login") }}" method="POST">
    @csrf
    <div class="color-create">
    <h1 class="title col-font-title">Login</h1>
    <label for="" class="col-font-des">Email : </label>
    <input type="email" placeholder="enter your email" class="form-control wid border-col inp mb-3" name="email" required>
    <label for="" class="col-font-des">Password : </label>
    <input type="password" placeholder="enter your password" name="password" class="form-control wid border-col inp mb-3" required>
    <input type="submit" class="col-up col-inp inpp mt-3" value="login">
</div>
</form>

@endsection
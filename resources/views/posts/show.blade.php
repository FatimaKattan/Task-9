@extends('layout.app')
@section('title', 'post')
@section('content')

    <div class="color line inf">
        <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-primary col-up inpp">Back to Home
                Page</button></a>
        <div class="container">
            <div class="">
                <div class="coll">
                    <h3 class="text-center">Post Information</h3>
                </div><br>
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
{{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#fff" d="M17 18h4v-2h-4v-2l-3 3l3 3zM11 4C8.8 4 7 5.8 7 8s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4m0 10c-4.4 0-8 1.8-8 4v2h9.5c-.3-.8-.5-1.6-.5-2.5c0-1.2.3-2.3.9-3.4c-.6 0-1.2-.1-1.9-.1"/></svg> --}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	<path fill="currentColor" d="M18 16h-4v2h4v2l3-3l-3-3zM11 4C8.8 4 7 5.8 7 8s1.8 4 4 4s4-1.8 4-4s-1.8-4-4-4m0 10c-4.4 0-8 1.8-8 4v2h9.5c-.3-.8-.5-1.6-.5-2.5c0-1.2.3-2.3.9-3.4c-.6 0-1.2-.1-1.9-.1" />
</svg> --}}
{{-- <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> --}}

{{-- <table class="table table-striped">
  ...
</table> --}}

{{-- <table class="table table-striped table-hover">
  ...
</table> --}}

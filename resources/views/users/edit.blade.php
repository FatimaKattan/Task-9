@extends('layout.app')
@section('name', 'Edit user')
@section('content')

<div class="color_edit">
    <h1 class="title col-font-title">Update user</h1>
    <br>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="color">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name" class="col-font-des">New Name:</label>
            <input type="text" id="name" name="name" class="form-control wid border-col inp mb-3" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email" class="col-font-des">New Email:</label>
            <input type="email" id="email" name="email" class="form-control wid border-col inp mb-3" value="{{ $user->email }}" required>
        </div>
        
        <div class="form-group">
            <label for="password" class="col-font-des">New Password:</label>
            <input type="password" id="password" name="password" class="form-control wid border-col inp mb-3">
        </div>
        
        <div class="form-group">
            <label for="password_confirmation" class="col-font-des">Confirm New Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control wid border-col inp mb-3">
        </div>
        
        <button type="submit" class="btn btn-primary wid loca col-inp inpp col-up col-upp">Update user</button>
    </form>
</div>

@endsection

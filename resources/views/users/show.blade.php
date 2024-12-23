@extends('layout.app')
@section('title', 'User Information')
@section('content')

    <div class="color line inf_user pt-5">
        <a href="{{ route('users.index') }}">
            <button type="button" class="btn btn-primary col-up inpp">Back to Home Page</button>
        </a>
        <div class="container">
            <div class="">
                <div class="coll">
                    <h3 class="text-center">User Information</h3>
                </div><br>
                
                <h5>Name:</h5>
                <p>{{ $user->name }}</p><br>

                <h5>Email:</h5>
                <p>{{ $user->email }}</p><br>

                <h5>Type:</h5>
                <p>{{ $user->is_admin ? 'Admin' : 'User' }}</p><br>

                <h5>Added At:</h5>
                <p>{{ $user->created_at->format('Y-m-d H:i:s') }}</p> <!-- تحسين عرض التاريخ -->
            </div>
        </div>
    </div>
@endsection

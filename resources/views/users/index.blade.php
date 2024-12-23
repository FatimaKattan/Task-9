@extends('layout.app')

@section('title', 'users')

@section('content')

<div class="father_user">
    <div class="mb-3 pt-4 mm mt-3">
        <a href="{{ route('users.create') }}">
            <button type="button" class="btn btn-primary ml col-up inpp flex_start ml-2">
                <p class="mdi--account-plus mb-0 mr-4"></p>Add New User
            </button>
        </a>
    </div>

    <div class="container justify-content-center">
        <table class="table table td table th table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="line col-font-title">{{ $user->name }}</a>
                        </td>
                        <td class="col-font">{{ $user->email }}</td>
                        <td>
                            @if ($user->is_admin)
                                <span class="color-admin">admin</span>
                            @else
                                <span class="color-user">user</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                            </form>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm inpp col-up">Update</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center"><h1>There are no users</h1></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
</div>

@endsection

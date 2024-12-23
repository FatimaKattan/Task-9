<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('createUser', User::class);
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->authorize('createUser', User::class);
        /* $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]); */
        /* $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'], 
        'password' =>Hash::make($request->password),
    ]);  */
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index');
        /* return response()->json($user, 201); */
    }

    public function edit(User $user)
    {
        $this->authorize('updateUser', $user);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $this->authorize('updateUser', $user);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
        ]);

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $this->authorize('showUser', $user);
        return view("users.show", compact('user'));

        /* dd($post); */
    }

    /* public function destroy(User $user)
{
    $currentUser = Auth::user();
    if (!$currentUser || !$currentUser->is_admin) {
        abort(403, 'Unauthorized action.');
    }

    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
} */
public function destroy(User $user)
{
    if (!Auth::user()->is_admin) {
        abort(403, 'Unauthorized action.');
    }

    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}
}

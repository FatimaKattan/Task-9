<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;


/* Route::get('/',[PostController::class ,"index"])->name("posts.index");
Route::get('/add',[PostController::class,"create"] )->name("posts.create");
Route::post("/",[PostController::class, "store"])->name("posts.store");
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); */

Route::get("/", [AuthController::class, "ShowLoginForm"])->name("login");
Route::post("/", [AuthController::class, "login"]);
Route::middleware("auth")->group(function () {
    Route::resource('posts', PostController::class);
    Route::post("/logout", [AuthController::class, "logout"])->name("logout");
    Route::resource('users', UserController::class);
});

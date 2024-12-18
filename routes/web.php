<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class ,"index"])->name("posts.index");
Route::get('/add',[PostController::class,"create"] )->name("posts.create");
Route::post("/",[PostController::class, "store"])->name("posts.store");
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
/* Route::get("/post/{id}" , [PostController::class ,"show"])->name("posts.index"); */


/* Route::resource('posts',PostController::class); */
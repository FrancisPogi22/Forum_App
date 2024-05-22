<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


Route::resource('/posts', PostController::class)->middleware(['auth', 'verified']);
Route::resource('/comments', CommentController::class)->middleware(['auth', 'verified']);

// Route::get('/posts', [PostController::class,'index']);
// Route::get('/posts/create', [PostController::class,'create']);
// Route::post('/posts', [PostController::class,'store']);
// Route::get('/posts/show', [PostController::class,'show']);
// Route::get('/posts/edit', [PostController::class,'edit']);
// Route::put('/posts/{id}', [PostController::class,'update']);

Route::get('/', function () {
    $posts = Post::all();

    return view("posts.index", ["posts" => $posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

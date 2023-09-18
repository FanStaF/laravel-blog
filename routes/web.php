<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('newsletter', NewsletterController::class);

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
//     Replaces all below
//     Route::get('admin/posts', [AdminPostController::class, 'index'])->name('all-posts');
//     Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('create-post');
//     Route::post('admin/posts', [AdminPostController::class, 'store']);
//     Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit'])->name('edit-post');
//     Route::patch("admin/posts/{post:id}", [AdminPostController::class, 'update'])->name('update-post');
//     Route::delete("admin/posts/{post:id}", [AdminPostController::class, 'destroy'])->name('update-post');
});

Route::get('rss', RssFeedController::class)->name('rss-feed');

<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\SessionsController;

use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/feed', [PostController::class, 'feed'])->name('feed')->middleware('auth');
Route::get('/posts/bookmarks', [PostController::class, 'bookmarks'])->name('bookmarks')->middleware('auth');
Route::post('/posts/bookmarks', [PostController::class, 'bookmark'])->name('bookmark');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::get('profile/{user:username}', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::patch('profile/{user:username}', [ProfileController::class, 'update'])->name('update-profile')->middleware('auth');

Route::post('/follow', [FollowController::class, 'follow'])->name('follow');
Route::post('/unfollow', [FollowController::class, 'unfollow'])->name('unfollow');

Route::post('newsletter', NewsletterController::class);

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});

Route::get('rss', RssFeedController::class)->name('rss-feed');


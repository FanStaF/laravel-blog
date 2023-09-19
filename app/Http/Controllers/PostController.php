<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function index()
    {

        return view('posts.index', [
            'posts' => Post::latest()->whereDate('published_at', '<=', now())
                ->filter(request(['search', 'category', 'author']))
                ->paginate()->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        $post->increment('view_count');
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function feed()
    {
        $followed_authors = auth()->user()->followed_authors()->pluck('id');

        return view('posts.index', [
            'posts' => Post::latest()->whereDate('published_at', '<=', now())
                ->whereIn('user_id', $followed_authors)
                ->paginate()->withQueryString()
        ]);
    }
}

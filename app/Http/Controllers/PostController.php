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

    public function bookmark()
    {

        request()->validate([
            'post_id' => ['required', Rule::exists('posts', 'id')]
        ]);
        $post_id = request('post_id');

        if( auth()->user()->bookmarks->contains($post_id) ){
            auth()->user()->bookmarks()->detach($post_id);
            return back()->with('success', 'You removed the bookmark');
        }

        auth()->user()->bookmarks()->attach($post_id);
        return back()->with('success', 'You have bookmarked ' . Post::firstWhere('id', $post_id)->value('title'));
    }

    public function bookmarks()
    {
        // dd(auth()->user()->bookmarks()->get());
        return view('posts.index', [
            'posts' => auth()->user()->bookmarks()
                ->paginate()->withQueryString()
        ]);
    }
}

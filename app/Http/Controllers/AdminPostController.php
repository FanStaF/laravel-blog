<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{

    public function index()
    {

        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $post = Post::create(array_merge($this->validatePost(), [
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        $button_pressed = request('button');
        if ($button_pressed == 'Save Draft') {
            $post->published_at = null;
            $post->save();
            return back()->with('success', 'Draft Saved!');
        } elseif ($button_pressed == 'Publish') {
            $post->published_at = now();
            $post->save();
            return redirect(route('post', $post))->with('success', 'Your new post is now published!');
        } else {
            $post->published_at = now()->add(1, 'week');
            $post->save();
            return redirect('/admin/posts')->with('sucess', "Your post will publish in $post->publised_at->diffForHumans()");
        }

    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        $button_pressed = request('button');
        if ($button_pressed == 'Save Draft') {
            $post->published_at = null;
            $post->save();
            return back()->with('success', 'Draft Saved!');
        } elseif ($button_pressed == 'Publish') {
            $post->published_at = now();
            $post->save();
            return redirect(route('post', $post))->with('success', 'Your new post is now published!');
        } else {
            $post->published_at = now()->add(1, 'week');
            $post->save();
            return redirect('/admin/posts')->with('success', "Your post will publish {$post->published_at->diffForHumans()}");
        }

    }

    protected function validatePost(?Post $post = null)
    {
        $post ??= new Post();

        // dd(request());
        return request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')->ignore($post)],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'user_id' => ['required'], Rule::exists('users', 'id'),
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'exerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }
}

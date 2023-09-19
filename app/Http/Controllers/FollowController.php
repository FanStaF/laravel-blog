<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FollowController extends Controller
{
    public function follow()
    {
        validator([
            'author_id' => ['requird', Rule::exists('users')]
        ]);

        $author_id = request('author_id');

        auth()->user()->followed_authors()->syncWithoutDetaching([$author_id]);
        return back()->with('success', 'You are now following ' . User::firstWhere('id', $author_id)->name);

    }

    public function unfollow()
    {
        validator([
            'author_id' => ['requird', Rule::exists('users')]
        ]);

        $author_id = request('author_id');

        auth()->user()->followed_authors()->detach([$author_id]);
        return back()->with('success', 'You have now unfollowed ' . User::firstWhere('id', $author_id)->name);
    }

}

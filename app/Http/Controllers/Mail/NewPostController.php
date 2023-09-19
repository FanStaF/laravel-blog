<?php

namespace App\Http\Controllers\Mail;

use App\Mail\NewPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class NewPostController extends Controller
{

    public function __construct(Post $post)
    {
        $this->send_email($post);
    }

    public function send_email(Post $post)
    {
        $author = $post->author()->first();

        $followers = $author->followers()->get();
        foreach ($followers as $follower) {
            // TODO delay mailing if post is scheduled for later release

            Mail::to($follower->email)->queue(new NewPost($post, $follower->name));

        }

    }
}

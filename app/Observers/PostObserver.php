<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class PostObserver
{
    /**
     * Handle the comment "created" event.
     * Saved c'est created + updated !
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function saved(Post $post)
    {
        Mail::to(env('MAIN_EMAIL'))->send(new \App\Mail\NewPost($post));
    }
}

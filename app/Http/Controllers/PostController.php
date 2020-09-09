<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function get(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('views.post.get')->with([
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $post_id)
    {

    }

    public function delete(Request $request, $post_id)
    {

    }

    public function all(Request $request)
    {

    }
}

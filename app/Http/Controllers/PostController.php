<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $post = new Post();
        $post->title = $request->get('title');

        $user = Auth::user();
        $user->posts()->save($post);
    }

    public function update(Request $request, $post_id)
    {

    }

    public function delete(Request $request, $post_id)
    {

    }

    public function all(Request $request)
    {
        $posts = Post::get();

        return view('views.post.all')->with([
            'posts' => $posts
        ]);
    }
}

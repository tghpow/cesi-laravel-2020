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

    public function form(Request $request, $post_id = null)
    {
        $is_creating = $post_id === null;

        $post = !$is_creating ? Post::findOrFail($post_id) : new Post();
        $action = !$is_creating ? route('post.create') : route('post.update', [$post_id]);

        return view('views.post.form')->with([
            'post' => $post,
            'action' => $action,
            'is_creating' => $is_creating
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');

        $user = Auth::user();
        $user->posts()->save($post);

        return redirect(route('post.all'));
    }

    public function update(Request $request, $post_id)
    {
        /*
         * findOrFail revient a faire Post::where('id', '=', $post_id)->first()
         * OrFail permet de retourner une erreur 404 si le post n'existe pas
         */
        $post_to_update = Post::findOrFail($post_id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $post_to_update->title = $request->get('title');
        $post_to_update->content = $request->get('content');

        $post_to_update->save();

        return redirect(route('post.get', [$post_id]));
    }

    public function delete(Request $request, $post_id)
    {
        $post_to_update = Post::findOrFail($post_id);
        $post_to_update->delete();
    }

    public function all(Request $request)
    {
        $posts = Post::get();

        return view('views.post.all')->with([
            'posts' => $posts
        ]);
    }
}

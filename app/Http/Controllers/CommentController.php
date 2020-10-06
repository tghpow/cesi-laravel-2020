<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);

        $validator = Validator::make($request->all(), [
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $comment = new Comment();
        $comment->content = $request->get('content');
        $comment->post_id = $post_id;
        $comment->user_id = Auth::user() ? Auth::user()->id : null;

        $comment->save();

        return redirect()->back();
    }

    public function myComments(Request $request)
    {
        $user = Auth::user()->load('comments');

        return view('views.comment.all')->with([
            'user' => $user
        ]);
    }
}
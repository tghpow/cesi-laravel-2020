<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $post_id = $request->route()->parameters('id')['id'];
        $post = Post::find($post_id);

        if (Auth::user()->id != $post->user_id){
            return redirect('/');
        }

        return $next($request);
    }
}

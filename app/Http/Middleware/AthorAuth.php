<?php


namespace App\Http\Middleware;
use Closure;

class AthorAuth
{
    public function handle($request, Closure $next)
    {
        $id = $this->routes('conferencess'); // For example, the current URL is: /posts/1/edit

        $post = App\Author::findOrFail($id); // Fetch the post

        if($post->user_id == $this->auth()->id)
        {
            return $next($request); // They're the owner, lets continue...
        }

        return redirect()->to('/');
    }

}
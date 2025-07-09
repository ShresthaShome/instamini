<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $post->likes()->create([
            'user_id' => Auth::id(),
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        $like = $post->likes()->where('user_id', Auth::id());

        if ($like) {
            $like->delete();
        }

        return back();
    }
}

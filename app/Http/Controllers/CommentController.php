<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Post $post)
    {
        // Validate the request data
        $data = $request->validate([
            'comment' => 'required|max:500',
        ]);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'comment' => $data['comment'],
        ]);

        // Redirect back to the post with a success message
        return redirect('/posts/' . $post->id);
    }

    public function destroy(Comment $comment)
    {

        if (Auth::id() !== $comment->user_id && Auth::id() !== $comment->post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $post_id = $comment->post_id;
        $comment->delete();

        return redirect('/posts/' . $post_id);
    }
}

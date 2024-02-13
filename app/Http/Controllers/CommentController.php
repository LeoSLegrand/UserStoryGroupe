<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->content = $validatedData['content'];
        $post->comments()->save($comment);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}

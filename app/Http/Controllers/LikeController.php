<?php

namespace App\Http\Controllers;

use App\Models\Like; // Modifier l'importation du modèle Like
use App\Models\Post; // Ajouter l'importation du modèle Post
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($id)
    {
        $post = Post::findOrFail($id);
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $post->likes()->save($like);

        return redirect()->back()->with('success', 'Post liked successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Like;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->content = $validatedData['content'];
        $post->save();

        return redirect()->back()->with('success', 'Le poste a été crée avec succès');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Le poste a été supprimé avec succès.');
    }

    public function like($id)
    {
        $post = Post::findOrFail($id);
        $user = auth()->user();

        // Vérifie si l'utilisateur a déjà liké ce message
        if ($post->likes()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Vous avez déjà like le poste');
        }

        // Enregistre le like si l'utilisateur n'a pas déjà liké ce message
        $like = new Like();
        $like->user_id = $user->id;
        $post->likes()->save($like);

        return redirect()->back()->with('success', 'Vous venez de like le poste avec succès.');
    }

    public function unlike($id)
    {
        $post = Post::findOrFail($id);
        $user = auth()->user();

        // Recherche le like de l'utilisateur sur ce post
        $like = $post->likes()->where('user_id', $user->id)->first();

        // Supprime le like s'il existe
        if ($like) {
            $like->delete();
            return redirect()->back()->with('success', 'Post unliked successfully.');
        } else {
            return redirect()->back()->with('error', 'You have not liked this post.');
        }
    }


}

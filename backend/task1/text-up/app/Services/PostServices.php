<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostServices
{
    public function index()
    {
        // Affichage de posts
        $posts = Post::get();
        return response()->success("la liste des articles", $posts);
    }

    public function store(Request $request)
    {
        // Création de posts
        $article = Post::create([
            "titre" => $request->titre,
            "texte" => $request->texte,
            "author_id" => request()->user()->id,
        ]);
        $article->tags()->attach($request->tag_id);
        return $article;
    }

    public function update(Request $request)
    {
        // mise à jour de posts
        $article = Post::find($request->id);
        $article->update([
            "titre" => $request->titre,
            "texte" => $request->texte
        ]);
        return $article;
    }

    public function delete(Request $request)
    {
        // suppression de posts
        $article = Post::find($request->id);
        $article->delete();
    }
}

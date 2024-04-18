<?php
Namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostServices {
    public function index (){
        // Affichage de posts
        $posts = Post::get();
        return response()->success("la liste des articles", $posts);
    }

    public function store (Request $request){
        // Création de posts
        Post::create([
            "title" => $request->title,
            "text" => $request->text,
            "author_id" => request()->user()->id,
        ]);
    }

    public function delete (Request $request){
        // suppression de posts
        $article = Post::find($request->id);
        $article->delete();
    }
}
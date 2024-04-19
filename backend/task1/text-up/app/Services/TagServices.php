<?php
Namespace App\Services;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagServices {
    public function index (){
        // Affichage de Tags
        $tags = Tag::get();
        return response()->success("la liste des tags", $tags);
    }

    public function store (Request $request){
        // Création de Tags
        $tag = Tag::create([
            "libelle" => $request->libelle
        ]);
        return $tag;
    }

    public function update (Request $request){
        // suppression de Tags
        $tag = Tag::find($request->id);
        $tag->update([
            "libelle" => $request->libelle
        ]);

        return $tag;
    }

    public function delete (Request $request){
        // suppression de Tags
        $tag = Tag::find($request->id);
        $tag->delete();
    }
}

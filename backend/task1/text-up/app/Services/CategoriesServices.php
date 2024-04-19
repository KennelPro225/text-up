<?php
Namespace App\Services;

use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategorieServices {
    public function index (){
        // Affichage de Categories
        $Categories = Categorie::get();
        return response()->success("la liste des catégories", $Categories);
    }

    public function store (Request $request){
        // Création de Categories
        $categorie = Categorie::create([
            "libelle" => $request->libelle
        ]);
        return $categorie;
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
        // suppression de Categories
        $categorie = Categorie::find($request->id);
        $categorie->delete();
    }
}

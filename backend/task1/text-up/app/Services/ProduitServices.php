<?php
Namespace App\Services;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitServices
{
    public function store(Request $request)
    {
        Produit::create($request->all());
    }

    public function delete(Request $request)
    {
        $produit = Produit::find($request->id);
        $produit->delete();
    }
}

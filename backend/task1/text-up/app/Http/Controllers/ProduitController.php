<?php

namespace App\Http\Controllers;

use App\Services\ProduitServices;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function store(Request $request) {
        return response()->success("le produit a été ajouté avec succès", (new ProduitServices())->store($request));
    }

    public function delete(Request $request) {
        return response()->success("le produit a été supprimé avec succès", (new ProduitServices())->delete($request));
    }
}

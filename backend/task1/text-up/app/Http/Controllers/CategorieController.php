<?php

namespace App\Http\Controllers;

use App\Services\CategorieServices;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(Request $request) {
        return response()->success("liste des catégories", (new CategorieServices())->index($request));
    }

    public function store(Request $request) {
        return response()->success("la catégorie a été ajouté avec succès", (new CategorieServices())->store($request));
    }

    public function update(Request $request) {
        return response()->success("la catégorie a été mis à jour avec succès", (new CategorieServices())->update($request));
    }

    public function delete(Request $request) {
        return response()->success("la catégorie a été supprimé avec succès", (new CategorieServices())->delete($request));
    }
}

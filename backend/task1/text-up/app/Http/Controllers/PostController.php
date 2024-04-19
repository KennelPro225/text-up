<?php

namespace App\Http\Controllers;

use App\Services\PostServices;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        return response()->success("liste des postes", (new PostServices())->index($request));
    }

    public function store(Request $request) {
        return response()->success("le poste a été ajouté avec succès", (new PostServices())->store($request));
    }

    public function update(Request $request) {
        return response()->success("le poste a été mis à jour avec succès", (new PostServices())->update($request));
    }

    public function delete(Request $request) {
        return response()->success("le poste a été supprimé avec succès", (new PostServices())->delete($request));
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\TagServices;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request) {
        return response()->success("liste des tags", (new TagServices())->index($request));
    }

    public function store(Request $request) {
        return response()->success("le tag a été ajouté avec succès", (new TagServices())->store($request));
    }

    public function update(Request $request) {
        return response()->success("le tag a été mis à jour avec succès", (new TagServices())->update($request));
    }

    public function delete(Request $request) {
        return response()->success("le tag a été supprimé avec succès", (new TagServices())->delete($request));
    }
}

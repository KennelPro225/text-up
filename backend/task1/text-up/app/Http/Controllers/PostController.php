<?php

namespace App\Http\Controllers;

use App\Services\PostServices;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request) {
        return response()->success("l'article a été ajouté avec succès", (new PostServices())->store($request));
    }

    public function delete(Request $request) {
        return response()->success("l'article a été supprimé avec succès", (new PostServices())->delete($request));
    }
}

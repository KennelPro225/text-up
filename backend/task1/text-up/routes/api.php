<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Categorie;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(PostController::class)->prefix("articles")->group(function(){
        Route::get("/all","index");
        Route::post("/ajouter","store");
        Route::post("/modifier/{id}","update");
        Route::delete("/supprimer/{id}","delete");
    });

    Route::controller(CategorieController::class)->prefix("categories")->group(function(){
        Route::get("/all","index");
        Route::post("/ajouter","store");
        Route::post("/modifier/{id}","update");
        Route::delete("/supprimer/{id}","delete");
    });

    Route::controller(TagController::class)->prefix("tags")->group(function(){
        Route::get("/all","index");
        Route::post("/ajouter","store");
        Route::post("/modifier/{id}","update");
        Route::delete("/supprimer/{id}","delete");
    });
});

Route::controller(UserController::class)->prefix("auth")->group(function(){
    Route::post('connexion', "connexion");
    Route::post('inscription', "inscription");
});

Route::controller(PostController::class)->prefix("articles")->group(function(){
    Route::delete("/supprimer/{id}","delete");
});

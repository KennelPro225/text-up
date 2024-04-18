<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
        Route::post("/ajouter","store");
        Route::delete("/supprimer/{id}","delete");
    });
});

Route::controller(UserController::class)->prefix("auth")->group(function(){
    Route::post('connexion', "connexion");
    Route::post('inscription', "inscription");
});

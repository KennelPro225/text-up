<?php

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->group(function (){
    Route::controller(ProduitController::class)->prefix("produits")->group(function(){
        Route::post("add","store");
        Route::delete("delete/{id}","delete");
    });

});
Route::controller(UserController::class)->prefix("auth")->group(function(){
    Route::post("/sign-up", "inscription")->middleware(["guest"]);
    Route::post("/sign-in", "connexion")->middleware(["guest"]);
});


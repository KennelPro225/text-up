<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function inscription(StoreUserRequest $request)
    {
        $user = new User();
        $user->nom = $request->nom;
        $user->prenoms = $request->prenoms;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->success(
            "inscription réussie, votre est en attente de confirmation",
            $user
        );
    }

    /**
     * Connexion de l'utilisateur.
     */
    public function connexion(UserLoginRequest $request)
    {
        if ($request->validated() && empty(auth()->user())) {
            $user = User::where("email", $request->email)
                ->first();
            if ($user->is_checked == True) {
                if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                    $user["token"] = $user->createToken(
                        "API TOKEN",
                        ['*'],
                        now()->addWeek()
                    )->plainTextToken;
                    return response()->success(
                        "Vous êtes connecté",
                        $user
                    );
                }else{
                    return response()->error("Email ou mot de passe incorrect");
                }
            } else {
                return response()->error("Votre compte n'est pas encore confirmé");
            }
        }
    }

    public function deconnexion()
    {
        if (!empty(auth()->user())) {
            auth()->user()->currentAccessToken()->delete();
            return response()->success("Vous êtes déconnecté");
        }
    }

}

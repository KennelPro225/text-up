<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            "libelle" => "Vêtements et accessoires"
        ]);

        Categorie::create([
            "libelle" => "Électronique"
        ]);

        Categorie::create([
            "libelle" => "Meubles et décoration"
        ]);

        Categorie::create([
            "libelle" => "Bricolage et jardin"
        ]);

        Categorie::create([
            "libelle" => "Beauté et santé"
        ]);

        Categorie::create([
            "libelle" => "Produits pour bébé et enfant"
        ]);
    }
}

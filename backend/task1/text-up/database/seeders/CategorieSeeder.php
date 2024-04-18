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
            "libelle" => "Langages de programmation"
        ]);

        Categorie::create([
            "libelle" => "Développement web"
        ]);

        Categorie::create([
            "libelle" => "Développement mobile"
        ]);

        Categorie::create([
            "libelle" => "DevOps"
        ]);

        Categorie::create([
            "libelle" => "Bases de données"
        ]);

        Categorie::create([
            "libelle" => "Cloud computing"
        ]);
    }
}

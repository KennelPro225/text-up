<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produit::create([
            "id_categorie" => 6,
            "nom" => "Couche de Bébé",
            "stock" => 10
        ]);

        Produit::create([
            "id_categorie" => 1,
            "nom" => "Tee-shirt Homme",
            "stock" => 10
        ]);
    }
}

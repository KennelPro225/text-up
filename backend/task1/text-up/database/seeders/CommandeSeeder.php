<?php

namespace Database\Seeders;

use App\Models\Commande;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commande::create([
            "id_produit"=>1,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);

        Commande::create([
            "id_produit"=>1,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);

        Commande::create([
            "id_produit"=>1,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);


        Commande::create([
            "id_produit"=>1,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);


        Commande::create([
            "id_produit"=>1,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);



        Commande::create([
            "id_produit"=>1,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);


        Commande::create([
            "id_produit"=>1,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);
        Commande::create([
            "id_produit"=>1,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);
        Commande::create([
            "id_produit"=>2,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);
        Commande::create([
            "id_produit"=>2,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);

        Commande::create([
            "id_produit"=>2,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);
        Commande::create([
            "id_produit"=>2,
            "id_user"=>1,
            "status"=>true,
            "date_finalisation"=>Carbon::today()
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nom" => "php",
            "prenoms" => "Kennel KASSI",
            "email" => "test@email.com",
            "password"=>"Azerty1"
        ]);
    }
}

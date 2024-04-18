<?php

namespace Database\Seeders;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "categorie_id" => 1,
            "libelle" => "Python",
        ]);

        Tag::create([
            "categorie_id" => 1,
            "libelle" => "Javascript",
        ]);

        Tag::create([
            "categorie_id" => 1,
            "libelle" => "PHP",
        ]);


        Tag::create([
            "categorie_id" => 1,
            "libelle" => "JAVA",
        ]);


        Tag::create([
            "categorie_id" => 1,
            "libelle" => "C++",
        ]);

        Tag::create([
            "categorie_id" => 1,
            "libelle" => "C#",
        ]);

        Tag::create([
            "categorie_id" => 2,
            "libelle" => "Front-end",
        ]);

        Tag::create([
            "categorie_id" => 2,
            "libelle" => "Back-end",
        ]);

        Tag::create([
            "categorie_id" => 2,
            "libelle" => "E-commerce",
        ]);
    }
}

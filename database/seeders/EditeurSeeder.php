<?php

namespace Database\Seeders;

use App\Models\Editeur;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EditeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $editeurs =[
            "Guma Logistique",
            "Guma Logistique Immobilier",
            "Adama Batili",
        ];

        foreach ($editeurs as $key => $editeur){
            $data = new Editeur();
            $data -> libelle = $editeur;
            $data -> save();
            }
    }
}

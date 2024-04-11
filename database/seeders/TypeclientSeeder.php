<?php

namespace Database\Seeders;

use App\Models\Typeclient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeclientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeclients =[
            "Ministère de l'environnement du développement durable et de la transition écologique",
            "Presidence de republique de cote d'ivoire",
            "Particulier",
        ];

        foreach ($typeclients as $key => $typeclient){
            $data = new Typeclient();
            $data -> nom = $typeclient;
            $data -> save();
            }
    }
    
}

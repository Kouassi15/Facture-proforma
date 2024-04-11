<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'typeclient_id' => 1,
                'nom' => "Ministère de l'environnement du développement durable et de la transition écologique",
            ],
            [
                'typeclient_id' => 2,
                'nom' => "Presidence de republique de cote d'ivoire",
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Devis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devis = Devis::get();
        if(count($devis) == 0 ){
            $devis = Devis::create([
                'facture_id' => 1,
                'titre' => 'Reparation',
                'montant_total' => 50000,
            ]);
        }
    }
}

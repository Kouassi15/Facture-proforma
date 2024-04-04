<?php

namespace Database\Seeders;

use App\Models\Factureitem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactureitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factureitems = Factureitem::get();
        if(count($factureitems) == 0 ){
            $factureitems = Factureitem::create([
                'devis_id' => 1,
                'designation' => 'moteur de voiture',
                'quantite' => '10',
                'prix_unit' => 5000,
                'montant_total' => 50000,
            ]);
        }
    }
  
}

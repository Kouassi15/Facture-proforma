<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Facture;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factures = Facture::get();
        if(count($factures) == 0 ){
            $factures = Facture::create([
                'numero_proforma' => 'BATN°0001 AN 2024'.count($factures),
                'client_id' => 1,
                'editeur_id' =>1,
                'numero' => 'N°00126 AN 2024',
                'Objet' => 'ENTRETIEN ET REPARATION DE VEHICULE',
                'date' => Carbon::now(),
                'montant_HT' => 500000,
                'TVA' => 500000 * 0.18,
                'remise' => 0,
                'montant_net' => 500000 + 90000,
            ]);
        }
    }
}

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
                'code' => ' 00001'.count($factures),
                'client_id' => 1,
                'editeur_id' =>1,
                'numero' => 'N°00126 AN 2024',
                'Objet' => 'ENTRETIEN ET REPARATION DE VEHICULE',
                'date' => Carbon::now(),
                'marque'=>'FORD ESPACE',
                'immatriculation'=>'D 72 805',
                'montant_HT' => 500000,
                'TVA' => 500000 * 0.18,
                'taxes'=> '18%',
                'remise' => 0,
                'montant_net' => 500000 + 90000,
                'montant_lettre' => 'CINQ CENT QUATRE VINGT DIX MILLE Fancs CFA'
            ]);
        }
    }
}

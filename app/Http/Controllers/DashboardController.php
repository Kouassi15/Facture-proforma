<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Devis;
use App\Models\Client;
use App\Models\Facture;
use App\Models\FactureItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $users = User::count();
        $clients = Client::count();
        $factures = Facture::count();
        $montantNet = Facture::sum('montant_net');

        return view('dashboard.pages.home', compact('users', 'clients','factures','montantNet'));
    }


    Public function storefacture(Request $request){

        $rules = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'editeur_id' => 'required|exists:editeurs,id',
        'numero' => 'required|string',
        'objet' => 'required|string',
        'remise' => 'nullable|numeric',
        'date' => 'required|date',
        'immatriculation' => 'nullable|string',
        'marque' => 'nullable|string',
        'incident' => 'nullable|string',
        'commentaire' => 'nullable|string',
        'titre' => 'required|array',

        ]);

            if ($request->client_id == '1')
            $indic = 'ministere';
        elseif ($request->client_id == '2')
            $indic = 'particulier';
        elseif ($request->client_id == '3')
            $indic = 'presidence';
        else
            return back()->route('facture.index',$request->client->id)->withErrors('Name of customer is not found.');

            $facture = new Facture();
        $facture->numero_proforma = $this->codeFacture();
        $facture->client_id = $request->client_id;

        if($indic === 'ministere'){

        $request->validate([
        'editeur_id' => 'required|exists:editeurs,id',
        'numero' => 'required|string',
        'objet' => 'required|string',
        'remise' => 'nullable|numeric',
        'date' => 'required|date',
        'immatriculation' => 'nullable|string',
        'marque' => 'nullable|string',
        // 'titre' => 'required|array',

        ]);

        $facture->editeur_id = $request->editeur_id;
        $facture->numero = $request->numero;
        $facture->objet = $request->objet;
        $facture->remise = $request->remise;
        $facture->date = $request->date;
        $facture->immatriculation = $request->immatriculation;
        $facture->marque = $request->marque;
        $facture->incident = $request->incident ?? null;
        $facture->commentaire= $request->commentaire ?? null;
        
        }elseif ($indic ==='particulier'){
            $request->validate([

            'editeur_id' => 'required|exists:editeurs,id',
            'objet' => 'required|string',
            'remise' => 'nullable|numeric',
            'date' => 'required|date',
            'immatriculation' => 'nullable|string',
            'marque' => 'nullable|string',
            // 'titre' => 'required|array',

        ]);

        $facture->editeur_id = $request->editeur_id;
        $facture->numero = $request->numero ?? null;
        $facture->objet = $request->objet;
        $facture->remise = $request->remise;
        $facture->date = $request->date;
        $facture->immatriculation = $request->immatriculation;
        $facture->marque = $request->marque;
        $facture->incident = $request->incident ?? null;
        $facture->commentaire= $request->commentaire ?? null;

        } elseif($indic ==='presidence'){

        $request->validate([

        'editeur_id' => 'required|exists:editeurs,id',
        'objet' => 'required|string',
        'remise' => 'nullable|numeric',
        'date' => 'required|date',
        'immatriculation' => 'nullable|string',
        'marque' => 'nullable|string',
        'incident' => 'nullable|string',
        'commentaire' => 'nullable|string',

        ]);

        $facture->editeur_id = $request->editeur_id;
        $facture->numero = $request->numero ?? null;
        $facture->objet = $request->objet;
        $facture->remise = $request->remise;
        $facture->date = $request->date;
        $facture->immatriculation = $request->immatriculation;
        $facture->marque = $request->marque;
        $facture->incident = $request->incident;
        $facture->commentaire= $request->commentaire;

        }
        // Sauvegarde de la facture principale
        $facture->save();

        $i = 0;

        while ($i < count($rules['titre'])) {
            $montantHT = 0;
            $section = new Devis();
            $section->facture_id = $facture->id;
            $section->titre = $rules['titre'][$i];
            $section->save();

            foreach ($request->input('designation' . ($i + 1)) as $key => $value) {
                $factureitem = new FactureItem();
                $factureitem->designation = $value;
                $factureitem->quantite = $request->input('quantite' . ($i + 1))[$key];
                $factureitem->prix_unit = $request->input('prix_unit' . ($i + 1))[$key];
                $factureitem->montant_total = $request->input('prix_unit' . ($i + 1))[$key] * $request->input('quantite' . ($i + 1))[$key];
                //$factureitem->facture_id = $facture->id;
                $factureitem->devis_id = $section->id;
                $factureitem->save();

                $montantHT += $request->input('prix_unit' . ($i + 1))[$key] * $request->input('quantite' . ($i + 1))[$key];
            }
            
            $section->montant_total = $montantHT;
            $section->save();

            $total += $montantHT;

            $total_HT = $total;

            $TVA = $total_HT * 0.18;

            $i++;
        }

        $facture->montant_HT = $total_HT;
        //Calculons la TVA
        $facture->TVA = $TVA ;
        $facture->montant_net = $total_HT + $TVA;
        $facture->save();
        try {
            return redirect()->route('facture.index')->with('success', 'La facture a été enregistrée avec succès');
        } catch (\Exception $e) {
            // Si une erreur se produit lors de l'enregistrement, affichez le message d'erreur
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de la facture : ' . $e->getMessage());
        }
    }


}

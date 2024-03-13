<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Client;
use App\Models\Facture;
use App\Models\FactureItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $factures = Facture::all();
         $clients = Client::all();
         $factureitems = FactureItem::all();
        return view('dashboard.pages.facture.index', compact('factures','clients','factureitems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        // dd($clients);
        return view('dashboard.pages.facture.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $rules = $request->validate([
        'client_id' => 'required',
        'numero' => 'required',
        'objet' => 'required',
        'remise' => 'required',
        'date' => 'required',
        'lieu' => 'required',
        'ligne' => 'required',
        // 'montant_TH' => 'required',
        // 'montant_net' => 'required',
        'titre' => 'required|array',
        // 'montant_total' => 'required|array',
    ]);

    $messages = [
        'client_id.required' => 'Le champ client est vide !',
        'numero.required' => 'Le numéro de facture est obligatoire !',
        'objet.required' => 'L\'objet de la facture est obligatoire !',
        'remise.required' => 'La remise est obligatoire !',
        'date.required' => 'La date est obligatoire !',
        'lieu.required' => 'Le lieu est obligatoire !',
        'ligne.required' => 'La ligne est obligatoire !',
    ];

    $TVA = 0;
    $total_HT = 0;
    $total = 0;
    $i = 0;

    while ($i < count($rules['titre'])) {
        $request->validate([
            "designation" . ($i + 1) => 'required|array',
            "quantite" . ($i + 1) => 'required|array',
            "prix_unit" . ($i + 1) => 'required|array',
            
        ]);

        $i++;
    }


    $facture = new Facture();
    $facture->client_id = $request->client_id;
    $facture->numero = $request->numero;
    $facture->objet = $request->objet;
    $facture->remise = $request->remise;
    $facture->date = $request->date;
    $facture->lieu = $request->lieu;
    $facture->ligne = $request->ligne;
    //  $facture->montant_HT = $total_HT;      //request->montant_total[0] - ($request->montant_total[0] * $request->remise / 100);
    //  $facture->TVA = $total_HT * 0.18;
    // $facture->montant_net = $facture->montant_HT + $facture->TVA;

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


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $facture = Facture::find($id);
        return view('dashboard.pages.facture.show', compact('facture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clients = Client::all();
        $facture = Facture::findOrFail($id);
        return view('dashboard.pages.facture.edit', compact('facture','clients'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $rules = $request->validate([
            'client_id' => 'required',
            'numero' => 'required',
            'objet' => 'required',
            'remise' => 'required',
            'date' => 'required',
            'lieu' => 'required',
            'ligne' => 'required',
            'titre' => 'required|array',
        ]);
    
        $TVA = 0;
        $total_HT = 0;
     
        $facture = Facture::find($id);
        $facture->client_id = $request->client_id;
        $facture->numero = $request->numero;
        $facture->objet = $request->objet;
        $facture->remise = $request->remise;
        $facture->date = $request->date;
        $facture->lieu = $request->lieu;
        $facture->ligne = $request->ligne;

        // Sauvegarde de la facture principale
        $facture->save();
        $total = 0;

        for ($i = 0; $i < count($rules['titre']); $i++) {
            $section = Devis::updateOrCreate([
                'facture_id' => $facture->id,
                'titre' => $rules['titre'][$i],
            ]);

             $montantHT= 0;

            $designationKey = "designation" . ($i + 1);
            $quantiteKey = "quantite" . ($i + 1);
            $prix_unitKey = "prix_unit" . ($i + 1);

            $designations = $request->input($designationKey, []);
            $quantites = $request->input($quantiteKey, []);
            $prix = $request->input($prix_unitKey, []);

            foreach ($designations as $key => $value) {
                $item = Factureitem::updateOrCreate([
                    'devis_id' => $section->id,
                    'designation' => $value,
                ], [
                    'quantite' => $quantites[$key] ?? 0,
                    'prix_unit' => $prix[$key] ?? 0,
                    'montant_total' => ($prix[$key] ?? 0) * ($quantites[$key] ?? 0),
                ]);

                $montantHT+= ($prix[$key] ?? 0) * ($quantites[$key] ?? 0);
            }

            $section->montant_total = $montantHT;
            $section->save();

            $total += $montantHT;
            $total_HT = $total;
            $TVA = $total_HT;
        }
       
        $facture->montant_HT = $total_HT;
        // //Calculons la TVA
         $facture->TVA = $total_HT * 0.18;
        $facture->montant_net = $total_HT + $TVA;
        // $facture->montant_net = $total;
        $facture->save();

        try {
                return redirect()->route('facture.index')->with('success', 'La facture a été enregistrée avec succès');
            } catch (\Exception $e) {
                // Si une erreur se produit lors de l'enregistrement, affichez le message d'erreur
                return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de la facture : ' . $e->getMessage());
            }
    }

    /* generer un pdf*/

    public function generatePDF($id)
    {
        // $data = ['facture' => Facture::findOrFail($id)];
        // $pdf = PDF::loadView('dashboard.pages.facture.pdf.devis', $data);
        // return $pdf->download('document.pdf');
        // $facture = Facture::findOrFail($id);
        $pdf =  Pdf::loadView('dashboard.pages.facture.pdf.devis', ['facture' => Facture::findOrFail($id)]);
        $pdf->setPaper('A4', 'portrait')->render();

        $response = new Response();
        $response->setContent($pdf->output())->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', "inline; filename=$id-" . date('dmY') . ".pdf");

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $facture = Facture::findOrFail($id);
        $facture->delete();

        return redirect()->route('facture.index')->with('Succes', 'La facture à été supprimé');
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Devis;
use App\Models\Client;
use App\Models\Editeur;
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
     *
     */
    private function codeFacture(){
        $lastFactureNumber = Facture::max('numero_proforma');
    
        // Si aucun numéro de facture n'est enregistré
        if (!$lastFactureNumber) {
            return 'BATN°0001 AN ' . Carbon::now()->format('Y');
        }
    
        // Extrait le numéro de la dernière facture
        $lastNumber = intval(substr($lastFactureNumber, 9));
    
        // Incrémente le dernier numéro de facture
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    
        return 'BATN°' . $newNumber . ' AN ' . Carbon::now()->format('Y');
    }
    
    public function particulier(){
        $clients = Client::all();
        $editeurs = Editeur::all();
        return view('dashboard.pages.facture.proforma.particulier',compact('clients','editeurs'));

    }

     public function proforma(){
        $clients = Client::all();
        $editeurs = Editeur::all();
        return view('dashboard.pages.facture.proforma.presidence',compact('clients','editeurs'));
     }
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
        $editeurs = Editeur::all();
        // dd($clients);
        return view('dashboard.pages.facture.create', compact('clients','editeurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $rules = $request->validate([
        'client_id' => 'required',
        'editeur_id' => 'required_if:client_id,ministere',
        'numero' => 'required_if:client_id,ministere|string|max:255',
        'objet' => 'required|string|max:255',
        'immatriculation' => 'required|string|max:255',
        'marque' => 'required|string|max:255',
        'remise' => 'nullable|numeric',
        'date' => 'required|date',
        'incident' => 'required_if:client_id,presidence|string|max:255',
        'commentaire' => 'required_if:client_id,presidence|string|max:255',
        'titre' => 'required|array',
        
    ]);

    // $messages = [
    //     'client_id.required' => 'Le champ client est vide !',
    //     'numero.required' => 'Le numéro de facture est obligatoire !',
    //     'objet.required' => 'L\'objet de la facture est obligatoire !',
    //     'remise.required' => 'La remise est obligatoire !',
    //     'date.required' => 'La date est obligatoire !',
    //     'lieu.required' => 'Le lieu est obligatoire !',
    //     'ligne.required' => 'La ligne est obligatoire !',
    // ];
    
    $montant_net = 0;
    $remise = 0;
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
    $facture->numero_proforma = $this->codeFacture();
    $facture->client_id = $request->client_id;
    $facture->editeur_id = $request->editeur_id;
    $facture->numero = $request->numero;
    $facture->objet = $request->objet;
    $facture->remise = $request->remise;
    $facture->date = $request->date;
    $facture->immatriculation = $request->immatriculation;
    $facture->marque = $request->marque;
    $facture->incident = $request->incident;
    $facture->commentaire= $request->commentaire;
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
       //calculons la remise de la facture
   
     $remise = ($total_HT * $facture->remise) / 100;

     // Affectation de la remise à l'objet facture
        $facture->remise = $remise;

     // Calcul du montant net
        $montant_net = $total_HT + $TVA - $remise;

      // Affectation des valeurs à l'objet facture
        $facture->montant_HT = $total_HT;
        $facture->TVA = $TVA ;
        $facture->montant_net = $montant_net;
        $facture->save();
    try {
        return redirect()->route('facture.index')->with('success', 'La facture a été enregistrée avec succès');
    } catch (\Exception $e) {
        // Si une erreur se produit lors de l'enregistrement, affichez le message d'erreur
        return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de la facture : ' . $e->getMessage());
    }
}

    // Public function store(Request $request){

    //     $rules = $request->validate([
    //     'client_id' => 'required|exists:clients,id',
    //     'editeur_id' => 'required|exists:editeurs,id',
    //     'numero' => 'required|string',
    //     'objet' => 'required|string',
    //     'remise' => 'nullable|numeric',
    //     'date' => 'required|date',
    //     'immatriculation' => 'nullable|string',
    //     'marque' => 'nullable|string',
    //     'incident' => 'nullable|string',
    //     'commentaire' => 'nullable|string',
    //     'titre' => 'required|array',

    //     ]);

    //         if ($request->client_id == '1')
    //         $indic = 'ministere';
    //     elseif ($request->client_id == '2')
    //         $indic = 'particulier';
    //     elseif ($request->client_id == '3')
    //         $indic = 'presidence';
    //     else
    //         return back()->route('facture.index',$request->client->id)->withErrors('Name of customer is not found.');

    //         $facture = new Facture();
    //     $facture->numero_proforma = $this->codeFacture();
    //     $facture->client_id = $request->client_id;

    //     if($indic === 'ministere'){

    //     $request->validate([
    //     'editeur_id' => 'required|exists:editeurs,id',
    //     'numero' => 'required|string',
    //     'objet' => 'required|string',
    //     'remise' => 'nullable|numeric',
    //     'date' => 'required|date',
    //     'immatriculation' => 'nullable|string',
    //     'marque' => 'nullable|string',
    //     // 'titre' => 'required|array',

    //     ]);

    //     $facture->editeur_id = $request->editeur_id;
    //     $facture->numero = $request->numero;
    //     $facture->objet = $request->objet;
    //     $facture->remise = $request->remise;
    //     $facture->date = $request->date;
    //     $facture->immatriculation = $request->immatriculation;
    //     $facture->marque = $request->marque;
    //     $facture->incident = $request->incident ?? null;
    //     $facture->commentaire= $request->commentaire ?? null;
        
    //     }elseif ($indic ==='particulier'){
    //         $request->validate([

    //         'editeur_id' => 'required|exists:editeurs,id',
    //         'objet' => 'required|string',
    //         'remise' => 'nullable|numeric',
    //         'date' => 'required|date',
    //         'immatriculation' => 'nullable|string',
    //         'marque' => 'nullable|string',
    //         // 'titre' => 'required|array',

    //     ]);

    //     $facture->editeur_id = $request->editeur_id;
    //     $facture->numero = $request->numero ?? null;
    //     $facture->objet = $request->objet;
    //     $facture->remise = $request->remise;
    //     $facture->date = $request->date;
    //     $facture->immatriculation = $request->immatriculation;
    //     $facture->marque = $request->marque;
    //     $facture->incident = $request->incident ?? null;
    //     $facture->commentaire= $request->commentaire ?? null;

    //     } elseif($indic ==='presidence'){

    //     $request->validate([

    //     'editeur_id' => 'required|exists:editeurs,id',
    //     'objet' => 'required|string',
    //     'remise' => 'nullable|numeric',
    //     'date' => 'required|date',
    //     'immatriculation' => 'nullable|string',
    //     'marque' => 'nullable|string',
    //     'incident' => 'nullable|string',
    //     'commentaire' => 'nullable|string',

    //     ]);

    //     $facture->editeur_id = $request->editeur_id;
    //     $facture->numero = $request->numero ?? null;
    //     $facture->objet = $request->objet;
    //     $facture->remise = $request->remise;
    //     $facture->date = $request->date;
    //     $facture->immatriculation = $request->immatriculation;
    //     $facture->marque = $request->marque;
    //     $facture->incident = $request->incident;
    //     $facture->commentaire= $request->commentaire;

    //     }
    //     // Sauvegarde de la facture principale
    //     $facture->save();

    //     $TVA = 0;
    //         $total_HT = 0;
    //         $total = 0;
    //         $i = 0;
        
    //         while ($i < count($rules['titre'])) {
    //             $request->validate([
    //                 "designation" . ($i + 1) => 'required|array',
    //                 "quantite" . ($i + 1) => 'required|array',
    //                 "prix_unit" . ($i + 1) => 'required|array',
                    
    //             ]);
        
    //             $i++;
    //         }
        
    //     $i = 0;

    //     while ($i < count($rules['titre'])) {
    //         $montantHT = 0;
    //         $section = new Devis();
    //         $section->facture_id = $facture->id;
    //         $section->titre = $rules['titre'][$i];
    //         $section->save();

    //         foreach ($request->input('designation' . ($i + 1)) as $key => $value) {
    //             $factureitem = new FactureItem();
    //             $factureitem->designation = $value;
    //             $factureitem->quantite = $request->input('quantite' . ($i + 1))[$key];
    //             $factureitem->prix_unit = $request->input('prix_unit' . ($i + 1))[$key];
    //             $factureitem->montant_total = $request->input('prix_unit' . ($i + 1))[$key] * $request->input('quantite' . ($i + 1))[$key];
    //             //$factureitem->facture_id = $facture->id;
    //             $factureitem->devis_id = $section->id;
    //             $factureitem->save();

    //             $montantHT += $request->input('prix_unit' . ($i + 1))[$key] * $request->input('quantite' . ($i + 1))[$key];
    //         }
            
    //         $section->montant_total = $montantHT;
    //         $section->save();

    //         $total += $montantHT;

    //         $total_HT = $total;

    //         $TVA = $total_HT * 0.18;

    //         $i++;
    //     }

    //     $facture->montant_HT = $total_HT;
    //     //Calculons la TVA
    //     $facture->TVA = $TVA ;
    //     $facture->montant_net = $total_HT + $TVA;
    //     $facture->save();
    //     try {
    //         return redirect()->route('facture.index')->with('success', 'La facture a été enregistrée avec succès');
    //     } catch (\Exception $e) {
    //         // Si une erreur se produit lors de l'enregistrement, affichez le message d'erreur
    //         return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de la facture : ' . $e->getMessage());
    //     }
    // }

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
        $editeurs = Editeur::all();
        $facture = Facture::findOrFail($id);
        return view('dashboard.pages.facture.edit', compact('facture','clients','editeurs'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $rules = $request->validate([
            // 'client_id' => 'required',
            'editeur_id' => 'required_if:client_id,ministere',
            'numero' => 'required_if:client_id,ministere|string|max:255',
            'objet' => 'required|string|max:255',
            'immatriculation' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'remise' => 'nullable|numeric',
            'date' => 'required|date',
            'incident' => 'required_if:client_id,presidence|string|max:255',
            'commentaire' => 'required_if:client_id,presidence|string|max:255',
            'titre' => 'required|array',
        ]);
         
        $remise = 0;
        $montant_net = 0;
        $TVA = 0;
        $total_HT = 0;
     
        $facture = Facture::find($id);
        //  $facture->client_id = $request->client_id;
        $facture->editeur_id = $request->editeur_id;
        $facture->numero = $request->numero;
        $facture->objet = $request->objet;
        $facture->remise = $request->remise;
        $facture->date = $request->date;
        $facture->immatriculation = $request->immatriculation;
        $facture->marque = $request->marque;
        $facture->incident = $request->incident;
        $facture->commentaire= $request->commentaire;
        // $facture->lieu = $request->lieu;
        // $facture->ligne = $request->ligne;
        // dd('ok');
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
            $TVA = $total_HT * 0.18;;
        }
       
        $remise = ($total_HT * $facture->remise) / 100;

        // Affectation de la remise à l'objet facture
           $facture->remise = $remise;
   
        // Calcul du montant net
           $montant_net = $total_HT + $TVA - $remise;
   
         // Affectation des valeurs à l'objet facture
           $facture->montant_HT = $total_HT;
           $facture->TVA = $TVA ;
           $facture->montant_net = $montant_net;
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

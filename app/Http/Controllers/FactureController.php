<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $rules = $request ->validate([
            'client_id' => 'required',
            'numero' => 'required',
            'objet' => 'required',
            'designation' => 'required',
            'quantite' => 'required',
            'prix_unit' => 'required',
            'montant_total' => 'required',
            'montant_HT' => 'required',
            'TVA' => 'required',
            'remise' => 'required',
            'montant_net' => 'required',
            'date' => 'required',
            'lieu' => 'required',
            'ligne' => 'required',
        ]);

        $messages = [
            'client_id.required' => 'Le champ client est vide !',
            'numero.required' => 'Le numero de facture est obligatoire !',
            'objet.required' => 'L\'objet de la facture est obligatoire !',
            'designation.required' => 'La designation de la factuer est obligatoire !',
            'quantite.required' => 'La quantité est obligatoire !',
            'prix_unit.required' => 'Le prix unitaire est obligatoire !',
            'montant_total.required' => 'Le montant total est obligatoire !',
            'montant_HT.required' => 'Le montant hors taxe est obligatoire !',
            'TVA.required' => 'La TVA est obligatoire !',
            'remise.required' => 'La remise est obligatoire !',
            'montant_net.required' => 'Le montant net est obligatoire !',
            'date.required' => 'La date est obligatoire !',
            'lieu.required' => 'Le lieu est obligatoire !',
            'ligne.required' => 'La ligne est obligatoire !',
        ];
        // $validate = Validator::make($request->all(), $rules, $messages);

        // if ($validate->fails()) {
        //     return redirect()->back()->withErrors($validate)->withInput();
        // }

        $facture = new Facture();
        $facture->client_id = $request->client_id;
        $facture->numero = $request->numero;
        $facture->objet = $request->objet;
        $facture->designation = $request->designation;
        $facture->quantite = $request->quantite;
        $facture->remise = $request->remise;
        $facture->date = $request->date;
        $facture->lieu = $request->lieu;
        $facture->ligne = $request->ligne;
        $facture->prix_unit = $request->prix_unit ;
        $facture->montant_HT = $request->prix_unit * $request->quantite;
        // $request->montant_total; //- ($request->montant_HT * $request->remise / 100) ;;
        $facture->TVA = $request->montant_HT * 0.18;
        $facture->montant_total = $request->prix_unit * $request->quantite;
        $facture->montant_net = $request->montant_HT + $request->TVA ;
        // $facture->montant_net = $facture->montant_HT + $facture->TVA;

        $facture->save();

        return redirect()->back()->with('success', 'La facture a été enregistrée avec succès');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

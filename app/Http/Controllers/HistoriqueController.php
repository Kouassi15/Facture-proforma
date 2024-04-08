<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */

     public function historique()
    {
        $clients = Client::all();
        $factures = Facture::get();
        return view('dashboard.pages.facture.historique',compact('factures'));
    }

    public function search(Request $request)
{
    $client_id = $request->client_id;
    $numero_proforma = $request->numero_proforma;
    $start_date = $request->start_date;
    $end_date = $request->end_date;

    $factures = Facture::query();

    // Filtrer par client_id si celui-ci est renseigné
    if ($client_id) {
        $factures->where('client_id', $client_id);
    }

    // Filtrer par numéro de proforma si celui-ci est renseigné
    if ($numero_proforma) {
        $factures->where('numero_proforma', $numero_proforma);
    }

    // Récupérer les résultats
    $factures = $factures->get();

    return view('dashboard.pages.facture.historique', compact('factures'));
}

    // public function search(Request $request)
    // {
   
    //     $client_id = $request->client_id;
    //     $numero_proforma = $request->numero_proforma;

    //     $factures = Facture::where('client_id',$request->client_id)
    //     ->where('numero_proforma',$request->numero_proforma)
    //     ->get();
    //     $query = Facture::whereBetween('client_id','numero_proforma', [$client_id, $numero_proforma])->get();
    //     return view('dashboard.pages.facture.historique',compact('factures'));
    // }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = Client::with('factures')->findOrFail($id);
        return view('client.show', compact('client'));
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

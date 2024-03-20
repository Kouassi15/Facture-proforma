<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('dashboard.pages.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'nom' => 'required',
         'prenom' => 'required',
         'contact' => 'required',

        ]);

        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->contact = $request->contact;
        
        $client->save();
        return redirect()->route('client.index')->with('Succès', 'Le client a été enregistrer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        return view('dashboard.pages.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('dashboard.pages.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $request->validate([
    //         'nom' => 'required|string|min:3',
    //         'prenom' => 'required|string|min:3',
    //         'contact' => 'required|integer|min:8',
   
    //     ], 
    //         $messages = [
    //             'nom.required' => 'Ce champ est obligatoire.',
    //             'nom.string' => 'Ce champ doit être une chaine de caractères.',
    //             'nom.min' => 'Ce champ doit contenir :min caractères minimun.',
    //             'prenom.required' => 'Ce champ est obligatoire.',
    //             'prenom.string' => 'Ce champ doit être une chaine de caractères.',
    //             'prenom.min' => 'Ce champ doit contenir :min caractères minimun.',
    //             'contact.required' => 'Ce champ est obligatoire.',
    //             'contact.integer' => 'Ce champ doit être des chiffres.',
    //             'contact.min' => 'Ce champ doit contenir :min chiffres minimun.',
                
    //         ]
    //     );
   
    //        $client = Client::findOrFail($id);
    //        $client->nom = $request->nom;
    //        $client->prenom = $request->prenom;
    //        $client->contact = $request->contact;
    //     //    dd('ok');
    //        $client->save();
    //        return redirect()->route('client.index')->with('Succès', 'Le client a été enregistrer avec succès');
    // }
    public function update(Request $request, string $id)
{
    $request->validate([
        'nom' => 'required|string|min:3',
        'prenom' => 'required|string|min:3',
        'contact' => 'required|numeric|min:8', // Changer 'integer' à 'numeric'
    ], 
    $messages = [
        'required' => 'Ce champ est obligatoire.',
        'string' => 'Ce champ doit être une chaîne de caractères.',
        'min' => 'Ce champ doit contenir au moins :min caractères.',
        'numeric' => 'Ce champ doit contenir des chiffres.',
    ]);

    $client = Client::findOrFail($id);
    $client->nom = $request->nom;
    $client->prenom = $request->prenom;
    $client->contact = $request->contact;

    $client->save();

    return redirect()->route('client.index')->with('success', 'Le client a été enregistré avec succès');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('client.index')->with('Succès', 'Le client a été enregistrer avec succès');
    }
}

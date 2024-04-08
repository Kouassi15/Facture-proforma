<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Typeclient;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeclients = Typeclient::all();
        $clients = Client::all();
        return view('dashboard.pages.client.index', compact('clients','typeclients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeclients = Typeclient::all();
        return view('dashboard.pages.client.create',compact('typeclients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'typeclient_id' => 'required',
         'nom' => 'required_if:typeclient_id,particulier,ministere,presidence|string|max:255',
         'prenom' => 'required_if:typeclient_id,particulier|string|max:255',
         'contact' => 'required_if:typeclient_id,ministere,presidence|string|max:255',

        ]);

        $client = new Client();
        $client->typeclient_id = $request->typeclient_id;
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
  
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|min:3',
            'prenom' => 'required|string|min:3',
            'contact' => 'required_if:typeclient_id,ministere,presidence|string|max:255',        
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

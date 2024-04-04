<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Secretariat;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $admins = Admin::all();
        $secretaires = Secretariat::all();
        // $elements = $users->merge($secretaires);
        // Fusionnez les collections d'utilisateurs et d'admins
        // $elements = new Collection();
        // $elements = $elements->merge($users);
        // $elements = $elements->merge($secretaires);
        return view('dashboard.pages.utilisateur.index', compact('secretaires','admins','users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.utilisateur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4',
            'prenom' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);
        //create user account
        $user = User::create(
            [
                "name" => $request->name . ' ' . $request->prenom,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]
        );

        $secretaire = new Secretariat();
        $secretaire->user_id = $user->id;
        $secretaire->firstname = $request->name;
        $secretaire->lastname = $request->prenom;
        $secretaire->contact = $request->contact;
        $secretaire->save();

        return redirect()->route('users.index')->with('success', 'La secretaire à été enregistrer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        $admins = Admin::all();
        $secretaire = Secretariat::find($id);
        return view('dashboard.pages.utilisateur.show',compact('secretaire','admins','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
       // $admins = Admin::all();
        $secretaire = Secretariat::find($id);
        return view('dashboard.pages.utilisateur.edit',compact('secretaire','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4',
            'prenom' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);
        //create user account
        $user = User::find($id);

        // Vérifier si l'utilisateur existe
        if ($user) {
            // Mettre à jour les données de l'utilisateur
            $user->update([
                "name" => $request->name . ' ' . $request->prenom,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]); 
            // Sauvegarder les modifications
            $user->save();
        }

        $secretaire = Secretariat::find($id);
        $secretaire->user_id = $user->id;
        $secretaire->firstname = $request->name;
        $secretaire->lastname = $request->prenom;
        $secretaire->contact = $request->contact;
        $secretaire->save();

        return redirect()->route('users.index')->with('success', 'La secretaire à été enregistrer avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $secretaire = Secretariat::findOrFail($id);
        $secretaire->delete();
        return redirect()->route('users.index')->with('success', 'La secretaire à été supprimé avec succès.');
    }
}

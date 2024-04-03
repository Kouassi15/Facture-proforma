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
        $secretaires = Admin::all();
        $elements = $users->merge($secretaires);
        // Fusionnez les collections d'utilisateurs et d'admins
        $elements = new Collection();
        $elements = $elements->merge($users);
        $elements = $elements->merge($secretaires);
        return view('dashboard.pages.utilisateur.index', compact('elements'));
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

        return redirect()->route('users.index')->with('success', 'Le secretaire à été enregistrer avec succès.');
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

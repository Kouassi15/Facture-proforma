<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Client;
use App\Models\Facture;
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


}

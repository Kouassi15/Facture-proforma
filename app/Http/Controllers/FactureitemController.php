<?php

namespace App\Http\Controllers;

use App\Models\FactureItem;
use Illuminate\Http\Request;

class FactureitemController extends Controller
{
    public function index(Request $request): Response
    {
        $factureitems = FactureItem::all();

        return view('factureitem.index', compact('factureitems'));
    }

    public function create(Request $request): Response
    {
        return view('factureitem.create');
    }

    public function store(Request $request, Facture $facture): Response
    {
        $factureitem = FactureItem::create($request->validated());

        $request->session()->flash('factureitem.id', $factureitem->id);

        return redirect()->route('factureitem.index');
    }

    public function show(Request $request, Factureitem $factureitem): Response
    {
        return view('factureitem.show', compact('factureitem'));
    }

    public function edit(Request $request, Factureitem $factureitem): Response
    {
        return view('factureitem.edit', compact('factureitem'));
    }

    public function update(Request $request,factureitem $factureitem): Response
    {
        $deviitem->update($request->validated());

        $request->session()->flash('factureitem.id', $factureitem->id);

        return redirect()->route('factureitem.index');
    }

    public function destroy(Request $request, Factureitem $factureitem): Response
    {
        $deviitem->delete();

        return redirect()->route('factureitem.index');
    }
}

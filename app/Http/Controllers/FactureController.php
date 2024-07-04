<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\User;
use App\Models\Vehicule;
use Barryvdh\DomPDF\Facade\Pdf; // Assurez-vous d'importer la façade
use Illuminate\Http\Request;
use Illuminate\View\View;

class FactureController extends Controller
{
    public function index(): View
    {
        $voitures = Vehicule::all();
        $users = User::all();
        $factures = Facture::all();
        return view('factures.index', compact('factures'));
    }

    public function create(): View
    {
        return view('factures.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'marque' => 'required',
            'couleur' => 'required',
            'annee' => 'required',
            'prix' => 'required',
            'libelle' => 'required|string|max:255',
        ]);

        Facture::create($validate);

        return redirect()->route('factures.index')
            ->with('success', 'Facture créée avec succès.');
    }

    public function show(Facture $facture)
    {
        return view('factures.show', compact('facture'));
    }

    public function edit(Facture $facture)
    {
        return view('factures.edit', compact('facture'));
    }

    public function update(Request $request, Facture $facture)
    {
        $validate = $request->validate([
            'marque' => 'required',
            'couleur' => 'required',
            'annee' => 'required',
            'prix' => 'required',
            'libelle' => 'required|string|max:255',
        ]);

        $facture->update($validate);

        return redirect()->route('factures.index')
            ->with('success', 'Facture modifiée avec succès.');
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();

        return redirect()->route('factures.index')
            ->with('success', 'Facture supprimée avec succès.');
    }

    public function generatePDF(Facture $facture)
    {


        $data = [
            'title' => 'Bienvenue au garage XYZ',
            'date' => date('d/m/Y'),
            'numéro' => 'N00868426BF',
            'facture' => $facture
        ];

        $pdf = Pdf::loadView('factures.pdf', $data);

        return $pdf->download('facture_garage_xyz'.$facture->id.'.pdf');
    }
}

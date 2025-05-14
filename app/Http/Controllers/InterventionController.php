<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InterventionController extends Controller
{
    public function index(): View
    {

      
        $interventions = Intervention::with('vehicule')->get();
        
        return view('interventions.index', compact('interventions'));
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehicules = Vehicule::all();
        return view('interventions.create', compact('vehicules'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'libelle' => 'required|string|max:255',
            'type' => 'required|in:interne,externe',
            'date' => 'required|date|before_or_equal:date',
            'vehicule_id' => 'nullable|exists:vehicules,id',

        ]);

        Intervention::create($validate);

        return redirect()->route('interventions.index')
            ->with('success', 'vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Intervention $intervention)
    {
        $vehicules = Vehicule::all();
        return view("interventions.show", compact('intervention', 'vehicules'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intervention $intervention)
    {
        $vehicules = Vehicule::all();
       return view('interventions.edit', compact('intervention', 'vehicules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intervention $intervention)
    {
        $validate = $request->validate([
            'libelle' => 'required|string|max:255',
            'type' => 'required|in:interne,externe',
            'date' => 'required|date|before_or_equal:date',
            'vehicule_id' => 'nullable|exists:vehicules,id',
            
        ]);

        $intervention->update($validate);

        return redirect()->route('interventions.index')
                         ->with('success', 'Annexe modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intervention $intervention)
    {
        $intervention->delete();

        return redirect()->route('interventions.index')
                         ->with('success', 'Annexe modifier avec success');
    }
}

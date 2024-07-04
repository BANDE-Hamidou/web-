<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InterventionController extends Controller
{
    public function index(): View
    {

      
        $interventions = Intervention::all();
        
        return view('interventions.index', compact('interventions'));
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('interventions.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'libelle' => 'required|string|max:255',
            'date' => 'required|date',

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
        return view("interventions.show", compact('intervention'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intervention $intervention)
    {
       return view('interventions.edit', compact('intervention'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intervention $intervention)
    {
        $validate = $request->validate([
            'libelle' => 'required|string|max:255',
            'date' => 'required|date',
            
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

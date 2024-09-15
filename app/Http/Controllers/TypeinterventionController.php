<?php

namespace App\Http\Controllers;

use App\Models\Typeintervention;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeinterventionController extends Controller
{
    public function index(): View
    {

      
        $typeinterventions = Typeintervention::all();
        
        return view('typeinterventions.index', compact('typeinterventions'));
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('typeinterventions.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        Typeintervention::create($validate);

        return redirect()->route('typeinterventions.index')
            ->with('success', 'vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Typeintervention $typeintervention)
    {
        return view("typeinterventions.show", compact('type_intervention'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Typeintervention $type_intervention)
    {
       return view('typeinterventions.edit', compact('type_intervention'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Typeintervention $typeintervention)
    {
        $validate = $request->validate([
            'libelle' => 'required|string|max:255',
           
        ]);

        $typeintervention->update($validate);

        return redirect()->route('typeinterventions.index')
                         ->with('success', 'Annexe modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Typeintervention $typeintervention)
    {
        $typeintervention->delete();

        return redirect()->route('typeinterventions.index')
                         ->with('success', 'Annexe modifier avec success');
    }
}

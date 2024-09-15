<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonnelController extends Controller
{
    public function index(): View
    {

      
        $personnels = Personnel::all();
        
        return view('personnels.index', compact('personnels'));
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('personnels.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        Personnel::create($validate);

        return redirect()->route('personnels.index')
            ->with('success', 'vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personnel $personnel)
    {
        return view("personnels.show", compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
       return view('personnels.edit', compact('personnel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personnel $personnel)
    {
        $validate = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        $personnel->update($validate);

        return redirect()->route('personnels.index')
                         ->with('success', 'Annexe modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnel $personnel)
    {
        $personnel->delete();

        return redirect()->route('personnels.index')
                         ->with('success', 'Annexe modifier avec success');
    }
}

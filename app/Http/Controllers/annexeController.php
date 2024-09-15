<?php

namespace App\Http\Controllers;

use App\Models\Annexe;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class annexeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $annexes = Annexe::all();//->with('Vehicule')->get();
        
        $vehicules = Vehicule::all();
    //    dd($annexes);
        return view("annexes.index", compact("annexes", "vehicules"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("annexes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required',
            'localisation' => 'required',
        ]);

        Annexe::create($validate);

        return redirect()->route('annexes.index')
            ->with('success', 'vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annexe $annexe)
    {
        return view("annexes.show", compact('annexe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annexe $annexe)
    {
       return view('annexes.edit', compact('annexe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annexe $annexe)
    {
        $validate = $request->validate([
            'nom' => 'required',
            'localisation' => 'required',
        ]);

        $annexe->update($validate);

        return redirect()->route('annexes.index')
                         ->with('success', 'Annexe modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annexe $annexe)
    {
        $annexe->delete();

        return redirect()->route('annexes.index')
                         ->with('success', 'Annexe modifier avec success');
    }
}

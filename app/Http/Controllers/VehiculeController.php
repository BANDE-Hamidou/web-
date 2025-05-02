<?php

namespace App\Http\Controllers;

use App\Models\Annexe;
use App\Models\Vehicule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = $request->input('query');
        if ($query) {
            $voitures = Vehicule::where('marque', 'LIKE', "%{$query}%")
                                ->orWhere('couleur', 'LIKE', "%{$query}%")
                                ->orWhere('annee', 'LIKE', "%{$query}%")
                                ->get();
        } else {
            $voitures = Vehicule::all();
        }

        return view('vehicules.index', compact('voitures', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $annexes = Annexe::all();
        return view('vehicules.create', compact('annexes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->validate([
            'marque' => 'required|string|max:255',
            'couleur' => 'required|string|min:3|max:20',
            'annee' => 'required|date|after_or_equal:today',
            'prix' => 'required|numeric|min:0|decimal:0,2', 
            'detail' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Vehicule::create($input);

        return redirect()->route('vehicules.index')
                         ->with('success', 'Vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicule $vehicule): View
    {
        return view('vehicules.show', compact('vehicule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicule $vehicule): View
    {
        return view('vehicules.edit', compact('vehicule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicule $vehicule): RedirectResponse
    {
        $request->validate([
            'marque' => 'required',
            'couleur' => 'required',
            'annee' => 'required',
            'prix' => 'required',
            'detail' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $vehicule->update($input);

        return redirect()->route('vehicules.index')
                         ->with('success', 'Vehicule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicule $vehicule): RedirectResponse
    {
        $vehicule->delete();

        return redirect()->route('vehicules.index')
                         ->with('success', 'Vehicule deleted successfully');
    }

    /**
     * Search for vehicles.
     */
    public function search(Request $request): View
    {
        $query = $request->input('query');
        $voitures = Vehicule::where('marque', 'LIKE', "%{$query}%")
                            ->orWhere('couleur', 'LIKE', "%{$query}%")
                            ->orWhere('annee', 'LIKE', "%{$query}%")
                            ->get();

        return view('vehicules.index', compact('voitures', 'query'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PieceController extends Controller
{
    public function index(): View
    {

      
        $pieces = Piece::all();
        
        return view('pieces.index', compact('pieces'));
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pieces.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required|string|max:255',
            'cout' => 'required|integer|max:10',
            'quantite' => 'required|integer|max:10',

        ]);

        Piece::create($validate);

        return redirect()->route('pieces.index')
            ->with('success', 'vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Piece $Piece)
    {
        return view("pieces.show", compact('piece'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Piece $Piece)
    {
       return view('pieces.edit', compact('piece'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Piece $Piece)
    {
        $validate = $request->validate([
            'nom' => 'required|string|max:255',
            'cout' => 'required|integer|max:10',
            'quantite' => 'required|integer|max:10',
           
        ]);

        $Piece->update($validate);

        return redirect()->route('pieces.index')
                         ->with('success', 'Annexe modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piece $Piece)
    {
        $Piece->delete();

        return redirect()->route('pieces.index')
                         ->with('success', 'Annexe modifier avec success');
    }
}

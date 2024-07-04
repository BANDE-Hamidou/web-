<?php

namespace App\Http\Controllers;

use App\Models\Type_piece;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypesPieceController extends Controller
{
    public function index(): View
    {

      
        $typepieces = Type_piece::all();
        
        return view('typepieces.index', compact('typepieces'));
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('typepieces.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
        ]);

        Type_piece::create($validate);

        return redirect()->route('typepieces.index')
            ->with('success', 'vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type_piece $type_piece)
    {
        return view("typepieces.show", compact('type_piece'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type_piece $type_piece)
    {
       return view('typepieces.edit', compact('type_piece'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type_piece $type_piece)
    {
        $validate = $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
           
        ]);

        $type_piece->update($validate);

        return redirect()->route('typepieces.index')
                         ->with('success', 'Annexe modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type_piece $type_piece)
    {
        $type_piece->delete();

        return redirect()->route('typepieces.index')
                         ->with('success', 'Annexe modifier avec success');
    }
}

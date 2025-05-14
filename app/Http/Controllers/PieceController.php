<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Models\Type_piece;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Exception;

class PieceController extends Controller
{
    public function index(): View
    {
        try {
            $pieces = Piece::with(['typePieces', 'intervention'])->get();
            return view('pieces.index', compact('pieces'));
        } catch (Exception $e) {
            Log::error('Erreur lors de la récupération des pièces : ' . $e->getMessage());
            abort(500, 'Une erreur est survenue lors du chargement des pièces.');
        }
    }

    public function create(): View|RedirectResponse
    {
        try {
            $typePieces = Type_piece::all();
            $interventions = Intervention::all();
            return view('pieces.create', compact('typePieces', 'interventions'));
        } catch (Exception $e) {
            Log::error('Erreur lors du chargement du formulaire : ' . $e->getMessage());
            return redirect()->route('pieces.index')->with('error', 'Impossible d\'accéder au formulaire de création.');
        }
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'cout' => 'required|numeric|min:0',
                'quantite' => 'required|integer|min:1',
                'intervention_id' => 'required|exists:interventions,id',
                'type_pieces' => 'nullable|array',
                'type_pieces.*' => 'exists:type_pieces,id'
            ]);

            $piece = Piece::create([
                'nom' => $validated['nom'],
                'cout' => $validated['cout'],
                'quantite' => $validated['quantite'],
                'intervention_id' => $validated['intervention_id']
            ]);

            if (isset($validated['type_pieces'])) {
                $piece->typePieces()->sync($validated['type_pieces']);
            }

            return redirect()->route('pieces.index')->with('success', 'Pièce créée avec succès.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (Exception $e) {
            Log::error('Erreur création pièce : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de la création de la pièce.');
        }
    }

    public function show($id): View|RedirectResponse
    {
        try {
            $piece = Piece::with(['typePieces', 'intervention'])->findOrFail($id);
            return view('pieces.show', compact('piece'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pièce non trouvée : ' . $id);
            return redirect()->route('pieces.index')->with('error', 'Pièce non trouvée.');
        } catch (Exception $e) {
            Log::error('Erreur affichage pièce : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de l\'affichage de la pièce.');
        }
    }

    public function edit($id): View|RedirectResponse
    {
        try {
            $piece = Piece::with('typePieces')->findOrFail($id);
            $typePieces = Type_piece::all();
            $interventions = Intervention::all();
            $selectedTypes = $piece->typePieces->pluck('id')->toArray();

            return view('pieces.edit', compact('piece', 'typePieces', 'interventions', 'selectedTypes'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pièce non trouvée pour édition : ' . $id);
            return redirect()->route('pieces.index')->with('error', 'Pièce non trouvée.');
        } catch (Exception $e) {
            Log::error('Erreur édition pièce : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de l\'édition de la pièce.');
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'cout' => 'required|numeric|min:0',
                'quantite' => 'required|integer|min:1',
                'intervention_id' => 'required|exists:interventions,id',
                'type_pieces' => 'nullable|array',
                'type_pieces.*' => 'exists:type_pieces,id'
            ]);

            $piece = Piece::findOrFail($id);
            $piece->update([
                'nom' => $validated['nom'],
                'cout' => $validated['cout'],
                'quantite' => $validated['quantite'],
                'intervention_id' => $validated['intervention_id']
            ]);

            $piece->typePieces()->sync($validated['type_pieces'] ?? []);

            return redirect()->route('pieces.index')->with('success', 'Pièce mise à jour avec succès.');
        } catch (ModelNotFoundException $e) {
            Log::error('Pièce non trouvée pour MAJ : ' . $id);
            return redirect()->route('pieces.index')->with('error', 'Pièce non trouvée.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (Exception $e) {
            Log::error('Erreur MAJ pièce : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de la pièce.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $piece = Piece::findOrFail($id);
            $piece->typePieces()->detach(); 
            $piece->delete();

            return redirect()->route('pieces.index')->with('success', 'Pièce supprimée avec succès.');
        } catch (ModelNotFoundException $e) {
            Log::error('Pièce non trouvée pour suppression : ' . $id);
            return redirect()->route('pieces.index')->with('error', 'Pièce non trouvée.');
        } catch (Exception $e) {
            Log::error('Erreur suppression pièce : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de la suppression de la pièce.');
        }
    }
}

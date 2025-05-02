<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Exception;

class PersonnelController extends Controller
{
    public function index(): View
    {
        try {
            $personnels = Personnel::with('service')->get();
            return view('personnels.index', compact('personnels'));
        } catch (Exception $e) {
            Log::error('Erreur lors de la récupération des personnels : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des données.');
        }
    }

    public function create(): View
    {
        try {
            $services = Service::all();
            return view('personnels.create', compact('services'));
        } catch (Exception $e) {
            Log::error('Erreur lors de l\'affichage du formulaire de création : ' . $e->getMessage());
            return redirect()->route('personnels.index')->with('error', 'Une erreur est survenue lors de l\'accès au formulaire.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'adresse' => 'required|string|max:255',
                'service_id' => 'required|exists:services,id',
            ]);

            Personnel::create($validated);

            return redirect()->route('personnels.index')
                ->with('success', 'Le personnel a été créé avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
            
        } catch (Exception $e) {
            Log::error('Erreur lors de la création du personnel : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du personnel.');
        }
    }

    public function show($id)
    {
        try {
            $personnel = Personnel::with('service')->findOrFail($id);
            return view('personnels.show', compact('personnel'));
            
        } catch (ModelNotFoundException $e) {
            Log::error('Personnel non trouvé : ' . $id);
            return redirect()->route('personnels.index')->with('error', 'Le personnel demandé n\'existe pas.');
            
        } catch (Exception $e) {
            Log::error('Erreur lors de l\'affichage du personnel : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'affichage des détails.');
        }
    }

    public function edit($id)
    {
        try {
            $personnel = Personnel::findOrFail($id);
            $services = Service::all();
            return view('personnels.edit', compact('personnel', 'services'));
            
        } catch (ModelNotFoundException $e) {
            Log::error('Personnel non trouvé pour modification : ' . $id);
            return redirect()->route('personnels.index')->with('error', 'Le personnel à modifier n\'existe pas.');
            
        } catch (Exception $e) {
            Log::error('Erreur lors de l\'édition du personnel : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'accès au formulaire de modification.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'adresse' => 'required|string|max:255',
                'service_id' => 'required|exists:services,id',
            ]);

            $personnel = Personnel::findOrFail($id);
            $personnel->update($validated);

            return redirect()->route('personnels.index')
                ->with('success', 'Le personnel a été mis à jour avec succès.');

        } catch (ModelNotFoundException $e) {
            Log::error('Personnel non trouvé pour mise à jour : ' . $id);
            return redirect()->route('personnels.index')->with('error', 'Le personnel à mettre à jour n\'existe pas.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
            
        } catch (Exception $e) {
            Log::error('Erreur lors de la mise à jour du personnel : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour du personnel.');
        }
    }

    public function destroy($id)
    {
        try {
            $personnel = Personnel::findOrFail($id);
            $personnel->delete();

            return redirect()->route('personnels.index')
                ->with('success', 'Le personnel a été supprimé avec succès.');

        } catch (ModelNotFoundException $e) {
            Log::error('Personnel non trouvé pour suppression : ' . $id);
            return redirect()->route('personnels.index')->with('error', 'Le personnel à supprimer n\'existe pas.');
            
        } catch (Exception $e) {
            Log::error('Erreur lors de la suppression du personnel : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression du personnel.');
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {

      
        $services = Service::all();
        
        return view('services.index', compact('services'));
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Service::create($validate);

        return redirect()->route('services.index')
            ->with('success', 'vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view("services.show", compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
       return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validate = $request->validate([
            'nom' => 'required|string|max:255',
            'date' => 'required|date',
           
        ]);

        $service->update($validate);

        return redirect()->route('services.index')
                         ->with('success', 'Annexe modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
                         ->with('success', 'Annexe modifier avec success');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Service;

class GarageController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all(); // οχήματα του user
        return view('garage.index', compact('vehicles'));
    }

    public function show($id)
    {
        $vehicle = Vehicle::with('services')->findOrFail($id);

        // Παίρνουμε τα services
        $services = $vehicle->services;

        return view('garage.show', compact('vehicle', 'services'));
    }

    public function services(Vehicle $vehicle)
    {
        $services = $vehicle->services;
        return view('garage.services', compact('vehicle', 'services'));
    }

   public function edit(Vehicle $garage)
{
    // $garage είναι το μοντέλο που παίρνει από το route {garage}
    return view('garage.edit', ['vehicle' => $garage]);
}

public function update(Request $request, Vehicle $garage)
{
    $validated = $request->validate([
        'brand'  => 'required|string|max:255',
        'model'  => 'required|string|max:255',
        'year'   => 'nullable|integer',
        'plate'  => 'nullable|string|max:20',
        'type'   => 'required|string|in:car,moto,boat,other',
        'engine' => 'nullable|string|max:255',
    ]);

    $garage->update($validated);

    return redirect()->route('garage.index')
                     ->with('success', 'Vehicle updated successfully!');
}


    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete(); // Θα σβήσει και όλα τα services λόγω onDelete('cascade')
        return redirect()->route('garage.index')->with('success', 'Vehicle deleted!');
    }


    public function create()
    {
        return view('garage.create'); // Blade με form για νέο όχημα
    }

public function store(Request $request)
{
    $request->validate([
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'plate' => 'required|string|max:255',
        'type' => 'required|string|max:255',
     
        'year' => 'required|integer',
        'engine' => 'nullable|string|max:255',
    ]);

    // Προτιμότερο: μέσω του χρήστη για να περαστεί σωστά το user_id
    auth()->user()->vehicles()->create($request->all());

    return redirect()->route('garage.index')->with('success', 'Vehicle added!');
}

}

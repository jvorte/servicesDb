<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle; 
use App\Models\Service;

class ServiceController extends Controller
{
   public function create(Vehicle $vehicle)
{
    return view('services.form', compact('vehicle'));
}

public function store(Request $request, Vehicle $vehicle)
{
    $data = $request->validate([
        'type' => 'required|string|max:255',
        'date' => 'required|date',
        'mileage' => 'required|integer',
        'garage' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
    ]);

    $vehicle->services()->create($data);
    return redirect()->route('garage.show', $vehicle);
}

public function edit(Vehicle $vehicle, Service $service)
{
    return view('services.form', compact('vehicle', 'service'));
}

public function update(Request $request, Vehicle $vehicle, Service $service)
{
    $data = $request->validate([
        'type' => 'required|string|max:255',
        'date' => 'required|date',
        'mileage' => 'required|integer',
        'garage' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
    ]);

    $service->update($data);
    return redirect()->route('garage.show', $vehicle);
}

public function destroy(Vehicle $vehicle, Service $service)
{
    $service->delete();
    return redirect()->route('garage.show', $vehicle);
}

}

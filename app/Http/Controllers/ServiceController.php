<?php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(Vehicle $vehicle)
    {
        $services = $vehicle->services; // σχέση 1:N
        return view('services.show', compact('vehicle', 'services'));
    }

    public function create(Vehicle $vehicle)
    {
        return view('services.create', compact('vehicle'));
    }

    public function store(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'mileage' => 'required|integer',
            'garage' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $vehicle->services()->create($validated);

        return redirect()->route('services.show', $vehicle);
    }

    public function edit(Vehicle $vehicle, Service $service)
    {
        return view('services.edit', compact('vehicle', 'service'));
    }

    public function update(Request $request, Vehicle $vehicle, Service $service)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'mileage' => 'required|integer',
            'garage' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $service->update($validated);

        return redirect()->route('services.show', $vehicle);
    }

    public function destroy(Vehicle $vehicle, Service $service)
    {
        $service->delete();
        return redirect()->route('services.show', $vehicle);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
    use Barryvdh\DomPDF\Facade\Pdf;
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
    $data = $request->validate([
        'type' => 'required|string|max:255',
        'date' => 'required|date',
        'mileage' => 'required|integer',
        'notes' => 'nullable|string',
        'garage' => 'nullable|string',
        'extras' => 'nullable|array',
        'extras.*' => 'string',
        'attachment' => 'nullable|file|mimes:pdf|max:10240', // max 10MB
    ]);

    // Αν υπάρχει PDF, αποθήκευσέ το και βάλε το path στο $data
    if ($request->hasFile('pdf')) {
        $data['attachment'] = $request->file('pdf')->store('services_pdfs', 'public');
    }

    $data['extras'] = isset($data['extras']) ? implode(', ', $data['extras']) : null;
    $data['vehicle_id'] = $vehicle->id;

    Service::create($data);

    return redirect()->route('services.show', $vehicle)->with('success', 'Service added!');
}





    public function edit(Vehicle $vehicle, Service $service)
    {
        return view('services.edit', compact('vehicle', 'service'));
    }

public function update(Request $request, Vehicle $vehicle, Service $service)
{
    $data = $request->validate([
        'type' => 'required|string|max:255',
        'date' => 'required|date',
        'mileage' => 'required|integer',
        'notes' => 'nullable|string',
        'garage' => 'nullable|string',
        'extras' => 'nullable|array',
        'extras.*' => 'string',
        'attachment' => 'nullable|file|mimes:pdf|max:10240',
    ]);

    // Αποθήκευση νέου PDF και διαγραφή παλιού
    if ($request->hasFile('pdf')) {
        if ($service->pdf && Storage::disk('public')->exists($service->pdf)) {
            Storage::disk('public')->delete($service->pdf);
        }
        $data['attachment'] = $request->file('pdf')->store('services', 'public');
    }

    $data['extras'] = isset($data['extras']) ? implode(', ', $data['extras']) : null;

    $service->update($data);

    return redirect()->route('services.show', $vehicle)->with('success', 'Service updated!');
}


    public function destroy(Vehicle $vehicle, Service $service)
    {

            if ($service->attachment && Storage::disk('public')->exists($service->attachment)) {
        Storage::disk('public')->delete($service->attachment);
    }
        $service->delete();
        return redirect()->route('services.show', $vehicle);
    }




public function exportPdf(Vehicle $vehicle)
{
    $services = $vehicle->services()->get();

    $pdf = Pdf::loadView('services.export-pdf', [
        'vehicle' => $vehicle,
        'services' => $services,
    ]);

    $fileName = $vehicle->brand . '_' . $vehicle->model . '_services.pdf';

    return $pdf->download($fileName);
}

}

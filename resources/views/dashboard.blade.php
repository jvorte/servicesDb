<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-2 font-semibold text-xl text-gray-800 leading-tight">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-gauge-icon lucide-circle-gauge">
                <path d="M15.6 2.7a10 10 0 1 0 5.7 5.7" />
                <circle cx="12" cy="12" r="2" />
                <path d="M13.4 10.6 19 5" />
            </svg>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Quick Actions -->
        <!-- <div class="flex gap-3">
            <a href="{{ route('garage.create') }}" class="px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700">
                + Add Vehicle
            </a>
            <a href="{{ route('garage.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700">
                View Garage
            </a>
        </div> -->

        <!-- Smart Alerts -->
        <div class="space-y-2">
            @foreach($vehicles as $vehicle)
                @foreach($vehicle->services as $service)
                    @php
                        $serviceDate = \Carbon\Carbon::parse($service->date);
                        $overdue = now()->gt($serviceDate->addYear()); // 1 έτος από το service
                        $upcoming = now()->diffInDays($serviceDate) <= 30 && !$overdue;
                        // Μπορείς να προσθέσεις και έλεγχο mileage αν έχει περάσει threshold
                        $mileageThreshold = 1000; 
                        $mileageOver = $service->mileage >= $service->vehicle->current_mileage + $mileageThreshold;
                    @endphp

                    @if($overdue || $mileageOver)
                        <div class="bg-red-100 text-red-700 p-2 rounded">
                            Overdue service for {{ $vehicle->brand }} {{ $vehicle->model }} ({{ $service->type }})
                        </div>
                    @elseif($upcoming)
                        <div class="bg-yellow-100 text-yellow-700 p-2 rounded">
                            Upcoming service for {{ $vehicle->brand }} {{ $vehicle->model }} ({{ $service->type }})
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>

        <!-- Recent Services -->
        <div class="bg-white shadow rounded-lg p-4">
            <h3 class="font-semibold mb-3">Recent Services</h3>
            @foreach($vehicles as $vehicle)
                <div class="mb-4">
                    <h4 class="font-medium">{{ $vehicle->brand }} {{ $vehicle->model }} ({{ $vehicle->type }})</h4>
                    <ul class="list-disc ml-5">
                        @forelse($vehicle->services->sortByDesc('date')->take(5) as $service)
                            <li>
                                {{ \Carbon\Carbon::parse($service->date)->format('Y-m-d') }} - {{ $service->type }} 
                                ({{ $service->mileage }} km)
                                @php
                                    $overdue = now()->gt(\Carbon\Carbon::parse($service->date)->addYear());
                                @endphp
                                @if($overdue)
                                    <span class="text-red-600 font-semibold">[OVERDUE]</span>
                                @endif
                            </li>
                        @empty
                            <li class="text-gray-500">No services recorded</li>
                        @endforelse
                    </ul>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>

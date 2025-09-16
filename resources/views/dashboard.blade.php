<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-2 font-semibold text-xl text-gray-800 leading-tight">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-gauge-icon lucide-circle-gauge">
                <path d="M15.6 2.7a10 10 0 1 0 5.7 5.7" />
                <circle cx="12" cy="12" r="2" />
                <path d="M13.4 10.6 19 5" />
            </svg>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Smart Alerts -->
        <div class="space-y-2">
            @foreach($vehicles as $vehicle)
                @foreach($vehicle->services as $service)
                    @if(!$service->completed)
                        @php
                            $serviceDate = $service->date instanceof \Carbon\Carbon
                                ? $service->date->copy()
                                : \Carbon\Carbon::parse($service->date);

                            $dueDate = $serviceDate->copy()->addYear();
                            $overdueByDate = now()->gt($dueDate);

                            $nextServiceKm = $service->next_service ?? 0;
                            $serviceBaseMileage = $service->mileage ?? 0;
                            $nextServiceMileage = $serviceBaseMileage + $nextServiceKm;
                            $currentMileage = $service->vehicle->current_mileage ?? 0;

                            $overdueByMileage = $currentMileage >= $nextServiceMileage;
                            $approachingByMileage = ! $overdueByMileage && ($currentMileage >= ($nextServiceMileage - 1000));

                            $isOverdue = $overdueByDate || $overdueByMileage;
                            $isUpcoming = !$isOverdue && ($dueDate->isFuture() && now()->diffInDays($dueDate) <= 30 || $approachingByMileage);
                        @endphp

                        @if($isOverdue)
                            <div class="bg-red-100 text-red-700 p-2 rounded flex justify-between items-center">
                                Overdue service for {{ $vehicle->brand }} {{ $vehicle->model }} ({{ $service->type }})
                                <form method="POST" action="{{ route('services.complete', $service) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="ml-3 px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                        Mark as done
                                    </button>
                                </form>
                            </div>
                        @elseif($isUpcoming)
                            <div class="bg-yellow-100 text-yellow-700 p-2 rounded flex justify-between items-center">
                                Upcoming service for {{ $vehicle->brand }} {{ $vehicle->model }} ({{ $service->type }})
                                <form method="POST" action="{{ route('services.complete', $service) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="ml-3 px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                        Mark as done
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>

        <!-- Recent Services -->
        <div class="bg-white shadow rounded-lg p-4">
            <h3 class="font-semibold mb-3 text-xl">Recent Services</h3>
            @foreach($vehicles as $vehicle)
                <div class="mb-4">
                    <h4 class="font-medium">{{ $vehicle->brand }} {{ $vehicle->model }} ({{ $vehicle->type }})</h4>
                    <ul class="list-disc ml-5">
                        @forelse($vehicle->services->sortByDesc('date')->take(5) as $service)
                            <li class="flex justify-between items-center">
                                <span>
                                    {{ \Carbon\Carbon::parse($service->date)->format('Y-m-d') }} - {{ $service->type }}
                                    ({{ $service->mileage }} km)
                                    @if(!$service->completed && now()->gt(\Carbon\Carbon::parse($service->date)->addYear()))
                                        <span class="text-red-600 font-semibold">[OVERDUE]</span>
                                    @endif
                                </span>

                                @if(!$service->completed)
                                    <form method="POST" action="{{ route('services.complete', $service) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="ml-3 px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                            Mark as done
                                        </button>
                                    </form>
                                @endif
                            </li>
                        @empty
                            <li class="text-gray-500">No services recorded</li>
                        @endforelse

                        {{-- Next Service --}}
                        @php
                            $lastService = $vehicle->services->sortByDesc('date')->first();
                        @endphp
                        @if($lastService)
                            <li class="mt-2 font-semibold">
                                Next Service: {{ ($lastService->mileage ?? 0) + ($lastService->next_service ?? 0) }} km
                            </li>
                        @else
                            <li class="text-gray-500">Next Service: N/A</li>
                        @endif
                    </ul>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>

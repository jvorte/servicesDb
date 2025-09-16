<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-wrench-icon lucide-wrench">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z" />
                </svg>
                {{ $vehicle->brand }} {{ $vehicle->model }} - {{ __('Services') }}
            </h2>

            {{-- Κουμπιά --}}
            <div class="flex gap-2">
                <a href="{{ route('services.export.pdf', $vehicle) }}"
                    class="px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md shadow hover:bg-green-700">
                    Export PDF
                </a>

                <a href="{{ route('services.create', $vehicle) }}"
                    class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-700">
                    + Add Service
                </a>
            </div>
        </div>
    </x-slot>


    <div class="py-6 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($services as $service)
        <div class="flex flex-col bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition p-4">
            {{-- Header --}}
            <div class="flex items-center justify-between mb-2">
                <h5 class="text-lg font-bold text-gray-900">
                    {{ \Carbon\Carbon::parse($service->date)->format('Y-m-d') }}
                </h5>
                <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">
                    {{ $service->type }}
                </span>
            </div>

      
            {{-- Content --}}
            <div class="flex-1 space-y-2 text-sm text-gray-700">
                <p><span class="font-medium">Description:</span>
                    {{ !empty($service->extras) ? implode(', ', (array) $service->extras) : '-' }}
                </p>
                <p><span class="font-medium">Mileage:</span> {{ $service->mileage }} km</p>
                <p><span class="font-medium">Garage:</span> {{ $service->garage ?? '-' }}</p>
                <p><span class="font-medium">Completed:</span>  {{ $service->completed ? 'Yes' : 'No' }}</p>
                <p class="line-clamp-3"><span class="font-medium">Notes:</span> {{ $service->notes ?? '-' }}</p>

                <p>
                    <span class="font-medium">Next Service:</span>
                    {{ $service->mileage + $service->next_service }} km
                </p>
            </div>


            @if($service->attachment)
            <p class="mb-2">
                <strong>Attachment:</strong>
                <a href="{{ Storage::url($service->attachment) }}" target="_blank" class="text-blue-600 hover:underline">
                    View PDF
                </a>
            </p>
            @endif

            {{-- Actions --}}
            <div class="mt-4 flex justify-end space-x-2">
                <a href="{{ route('services.edit', [$vehicle, $service]) }}"
                    class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </a>
                <div x-data="{ open: false }">
                    <!-- Delete button -->
                    <button
                        @click="open = true"
                        class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div
                        x-show="open"
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                        x-cloak>
                        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
                            <h2 class="text-lg font-semibold text-gray-800">
                                Delete this service?
                            </h2>
                            <p class="text-sm text-gray-600 mt-2">
                                Are you sure you want to delete this service? This action cannot be undone.
                            </p>

                            <div class="mt-6 flex justify-end space-x-3">
                                <!-- Cancel -->
                                <button
                                    @click="open = false"
                                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                                    Cancel
                                </button>

                                <!-- Confirm Delete -->
                                <form action="{{ route('services.destroy', [$vehicle, $service]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                        Yes, delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @empty
        <div class="col-span-full text-center text-gray-500">
            No services found
        </div>
        @endforelse
    </div>

</x-app-layout>
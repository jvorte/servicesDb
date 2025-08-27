<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $vehicle->make }} {{ $vehicle->model }} - {{ __('Services') }}
            </h2>
            <a href="{{ route('garage.createService', $vehicle) }}"
               class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-700">
                + Add Service
            </a>
        </div>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Mileage</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Garage</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($services as $service)
                        <tr>
                            <td class="px-6 py-4">{{ $service->type }}</td>
                            <td class="px-6 py-4">{{ $service->date->format('Y-m-d') }}</td>
                            <td class="px-6 py-4">{{ $service->mileage }}</td>
                            <td class="px-6 py-4">{{ $service->garage ?? '-' }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('garage.editService', [$vehicle, $service]) }}"
                                   class="px-2 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('garage.deleteService', [$vehicle, $service]) }}" method="POST"
                                      class="inline-block" onsubmit="return confirm('Delete this service?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No services found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

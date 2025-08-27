<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Service for {{ $vehicle->make }} {{ $vehicle->model }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('garage.storeService', $vehicle) }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Type</label>
                    <input type="text" name="type" class="w-full border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Date</label>
                    <input type="date" name="date" class="w-full border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Mileage</label>
                    <input type="number" name="mileage" class="w-full border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Garage</label>
                    <input type="text" name="garage" class="w-full border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Notes</label>
                    <textarea name="notes" class="w-full border-gray-300 rounded-md" rows="3"></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Add Service</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Vehicle
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto bg-white shadow sm:rounded-lg p-6">
        <form method="POST" action="{{ route('garage.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Make</label>
                <input type="text" name="brand" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Model</label>
                <input type="text" name="model" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Year</label>
                <input type="number" name="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Plate</label>
                <input type="text" name="plate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select id="countries" name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="car">Car</option>
                    <option value="moto">Motorcycle</option>
                    <option value="boat">Boat</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Engine (optional)</label>
                <input type="text" name="engine" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('garage.index') }}" class="mr-3 text-gray-600 hover:text-gray-900">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700">
                    Add Vehicle
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
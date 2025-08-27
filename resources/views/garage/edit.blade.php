<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Service - {{ $vehicle->make }} {{ $vehicle->model }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('garage.update', [$vehicle, $service]) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Service Name</label>
                    <input type="text" name="name" value="{{ old('name', $service->name) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" value="{{ old('date', $service->date) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('garage.show', $vehicle) }}"
                       class="mr-3 text-gray-600 hover:text-gray-900">Cancel</a>
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-700">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Service for {{ $vehicle->make }} {{ $vehicle->model }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('services.store', $vehicle) }}">
                @csrf

                {{-- Service Type --}}
                <div class="mb-4">
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Service Type</label>
                    <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="Full Service">Full Service</option>
                        <option value="Small Service">Small Service</option>
                        <option value="Repairs">Repairs</option>
                        <option value="Upgrade">Upgrade</option>
                        <option value="Check">Check</option>
                    </select>
                </div>

                {{-- Date --}}
                <div class="mb-4">
                    <label for="date" class="block text-gray-700 font-medium mb-1">Date</label>
                    <input type="date" name="date" id="date" class="w-full border-gray-300 rounded-md" required>
                </div>

                {{-- Mileage --}}
                <div class="mb-4">
                    <label for="mileage" class="block text-gray-700 font-medium mb-1">Mileage</label>
                    <input type="number" name="mileage" id="mileage" class="w-full border-gray-300 rounded-md" required>
                </div>

                {{-- Extras / Checkboxes --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Extras</label>
                    <div class="flex flex-wrap gap-4">
                        @php
                            $extrasOptions = ['Oil', 'Oil Filter', 'Fuel Filter', 'Air Filter', 'Cabin Filter', 'Sparks'];
                        @endphp
                        @foreach($extrasOptions as $extra)
                            <div class="flex items-center">
                                <input type="checkbox" name="extras[]" value="{{ $extra }}" id="{{ Str::slug($extra) }}" class="w-4 h-4 text-blue-600 border-gray-300 rounded-sm">
                                <label for="{{ Str::slug($extra) }}" class="ml-2 text-sm font-medium text-gray-900">{{ $extra }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                      {{-- garage --}}
                <div class="mb-4">
                    <label for="notes" class="block text-gray-700 font-medium mb-1">Garage</label>
       <input type="text" name="garage" id="garage" value="Home" class="w-full border-gray-300 rounded-md">

                </div>

                {{-- Notes --}}
                <div class="mb-4">
                    <label for="notes" class="block text-gray-700 font-medium mb-1">Notes</label>
                    <textarea name="notes" id="notes" class="w-full border-gray-300 rounded-md" rows="3"></textarea>
                </div>

                {{-- Submit --}}
                <div class="flex justify-end">
                    <a href="{{ route('services.index', $vehicle) }}" class="mr-3 text-gray-600 hover:text-gray-900">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700">Add Service</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

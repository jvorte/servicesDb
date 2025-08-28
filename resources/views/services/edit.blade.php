<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Service for {{ $vehicle->make }} {{ $vehicle->model }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('services.update', [$vehicle, $service]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Service Type --}}
                <div class="mb-4">
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Service Type</label>
                    <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @php
                        $types = ['Small Service', 'Full Service', 'Repairs', 'Upgrade', 'Check'];
                        $selectedType = old('type', $service->type ?? '');
                        @endphp
                        @foreach($types as $type)
                        <option value="{{ $type }}" {{ $selectedType === $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Date</label><input type="date"
                        name="date"
                        value="{{ old('date', $service->date->format('Y-m-d')) }}"
                        class="w-full border-gray-300 rounded-md"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Mileage</label>
                    <input type="number" name="mileage" value="{{ old('mileage', $service->mileage) }}" class="w-full border-gray-300 rounded-md" required>
                </div>

                @php
                $extrasOptions = ['Oil', 'Oil Filter', 'Fuel Filter', 'Air Filter', 'Cabin Filter', 'Sparks'];

                // Παίρνουμε τα ήδη αποθηκευμένα extras από τη βάση, και τα μετατρέπουμε σε array
                $selectedExtras = isset($service->extras) ? explode(', ', $service->extras) : [];
                @endphp

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Extras</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach($extrasOptions as $extra)
                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                name="extras[]"
                                value="{{ $extra }}"
                                id="{{ Str::slug($extra) }}"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded-sm"
                                {{ in_array($extra, old('extras', $selectedExtras)) ? 'checked' : '' }}>
                            <label for="{{ Str::slug($extra) }}" class="ml-2 text-sm font-medium text-gray-900">{{ $extra }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Garage</label>
                    <input type="text" name="garage" value="{{ old('garage', $service->garage) }}" class="w-full border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Notes</label>
                    <textarea name="notes" class="w-full border-gray-300 rounded-md" rows="3">{{ old('notes', $service->notes) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="attachment" class="block text-gray-700 font-medium mb-1">Attachment (PDF)</label>
                    <input type="file" name="attachment" id="attachment" accept="application/pdf" class="w-full border-gray-300 rounded-md">
                </div>


                <div class="flex justify-end space-x-2">
                    <a href="{{ route('services.show', $vehicle) }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update Service</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Edit Service for') }} {{ $vehicle->make }} {{ $vehicle->model }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('services.update', [$vehicle, $service]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Service Type --}}
                <div class="mb-4">
                    <div class="mb-4">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900">
                            {{ __('messages.Service Type') }}
                        </label>

                        <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                            <option value="Small Service" {{ old('type', $service->type ?? '') === 'Small Service' ? 'selected' : '' }}>
                                {{ __('messages.Small Service') }}
                            </option>
                            <option value="Full Service" {{ old('type', $service->type ?? '') === 'Full Service' ? 'selected' : '' }}>
                                {{ __('messages.Full Service') }}
                            </option>
                            <option value="Repairs" {{ old('type', $service->type ?? '') === 'Repairs' ? 'selected' : '' }}>
                                {{ __('messages.Repairs') }}
                            </option>
                            <option value="Upgrade" {{ old('type', $service->type ?? '') === 'Upgrade' ? 'selected' : '' }}>
                                {{ __('messages.Upgrade') }}
                            </option>
                            <option value="Check" {{ old('type', $service->type ?? '') === 'Check' ? 'selected' : '' }}>
                                {{ __('messages.Check') }}
                            </option>
                        </select>
                    </div>

                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">{{ __('messages.Date') }}</label><input type="date"
                        name="date"
                        value="{{ old('date', $service->date->format('Y-m-d')) }}"
                        class="w-full border-gray-300 rounded-md"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">{{ __('messages.Mileage') }}</label>
                    <input type="number" name="mileage" value="{{ old('mileage', $service->mileage) }}" class="w-full border-gray-300 rounded-md" required>
                </div>

                @php
                $extrasOptions = ['Oil', 'Oil Filter', 'Fuel Filter','Cooling Fluid', 'Air Filter', 'Cabin Filter', 'Sparks', 'Haldex','Dpf', 'Brakes Front', 'Brakes Rear', ];


                $selectedExtras = isset($service->extras) ? explode(', ', $service->extras) : [];
                @endphp

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">{{ __('messages.Details') }}</label>
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
                    <label for="next_service" class="block mb-2 text-sm font-medium">{{ __('messages.next_service') }}</label>
                    <select id="next_service" name="next_service" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="{{ old('notes', $service->next_service) }}">{{ old('notes', $service->next_service) }}</option>
                        <option value="3500">3500</option>
                        <option value="5000">5000</option>
                        <option value="8500">8500</option>
                        <option value="10000">10000</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">{{ __('messages.Notes') }}</label>
                    <textarea name="notes" class="w-full border-gray-300 rounded-md" rows="3">{{ old('notes', $service->notes) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="attachment" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Attachment') }} (PDF)
                    </label>
                    <input type="file"
                        name="attachment"
                        id="attachment"
                        accept="application/pdf"
                        class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer 
                  bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <p class="mt-1 text-xs text-gray-500">Upload a PDF file (max 5MB).</p>
                </div>



                <div class="flex justify-end space-x-3">
                    <a href="{{ route('services.show', $vehicle) }}"
                        class="px-4 py-2 rounded-md border border-gray-300 bg-white text-gray-700 shadow hover:bg-gray-100">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit"
                        class="px-4 py-2 rounded-md bg-indigo-600 text-white shadow hover:bg-indigo-700">
                        {{ __('Update Service') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
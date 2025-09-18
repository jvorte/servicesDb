<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Edit') }} : {{ old('brand', $vehicle->brand ?? '') }} - {{ old('model', $vehicle->model ?? '') }}
        </h2>
    </x-slot>

    <div class="my-6 max-w-4xl mx-auto bg-white shadow sm:rounded-lg p-6">
        <form method="POST" action="{{ route('garage.update', $vehicle->id) }}">
            @csrf
            @method('PUT')


            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Brand') }}</label>
                <input type="text" name="brand"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    value="{{ old('brand', $vehicle->brand ?? '') }}">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Model') }}</label>
                <input type="text" name="model"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    value="{{ old('model', $vehicle->model ?? '') }}">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Year') }}</label>
                <input type="number" name="year"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    value="{{ old('year', $vehicle->year ?? '') }}">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Plate') }}</label>
                <input type="text" name="plate"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    value="{{ old('plate', $vehicle->plate ?? '') }}">
            </div>

            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium">{{ __('messages.Select an option') }}</label>
                <select id="countries" name="type"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="car" {{ old('type', $vehicle->type ?? '') == 'car' ? 'selected' : '' }}>{{ __('messages.Car') }}</option>
                    <option value="moto" {{ old('type', $vehicle->type ?? '') == 'moto' ? 'selected' : '' }}>{{ __('messages.Motorcycle') }}</option>
                    <option value="boat" {{ old('type', $vehicle->type ?? '') == 'boat' ? 'selected' : '' }}>{{ __('messages.Boat') }}</option>
                    <option value="other" {{ old('type', $vehicle->type ?? '') == 'other' ? 'selected' : '' }}>{{ __('messages.Other') }}</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Engine (optional)') }}</label>
                <input type="text" name="engine"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    value="{{ old('engine', $vehicle->engine ?? '') }}">
            </div>

        <div class="flex justify-end space-x-3">
    <a href="{{ route('garage.index') }}"
       class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 bg-white shadow hover:bg-gray-100">
        {{ __('messages.Cancel') }}
    </a>
    <button type="submit"
       class="px-4 py-2 rounded-md bg-indigo-600 text-white shadow hover:bg-indigo-700">
        {{ __('messages.Update Vehicle') }}
    </button>
</div>

        </form>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('messages.Add Vehicle') }}
        </h2>
    </x-slot>

    <div class="my-6 max-w-4xl mx-auto bg-white shadow sm:rounded-lg p-6">
        <form method="POST" action="{{ route('garage.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Brand') }}</label>
                <input type="text" name="brand" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Model') }}</label>
                <input type="text" name="model" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Year') }}</label>
                <input type="number" name="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Plate') }}</label>
                <input type="text" name="plate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium">{{ __('messages.Select an option') }}</label>
                <select id="countries" name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="car">{{ __('messages.Car') }}</option>
                    <option value="moto">{{ __('messages.Motorcycle') }}</option>
                    <option value="boat">{{ __('messages.Boat') }}</option>
                    <option value="other">{{ __('messages.Other') }}</option>
                </select>
            </div>
         
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">{{ __('messages.Engine (optional)') }}</label>
                <input type="text" name="engine" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

      <div class="flex justify-end space-x-3">
    <a href="{{ route('garage.index') }}" 
       class="px-4 py-2 rounded-md border border-gray-300 bg-white text-gray-700 shadow-sm hover:bg-gray-100">
        {{ __('messages.Cancel') }}
    </a>
    <button type="submit" 
            class="px-4 py-2 rounded-md bg-indigo-600 text-white shadow hover:bg-indigo-700">
        {{ __('messages.Add Vehicle') }}
    </button>
</div>

        </form>
    </div>
</x-app-layout>
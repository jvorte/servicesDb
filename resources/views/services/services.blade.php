<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services for') }} {{ $vehicle->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Service</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td class="border px-4 py-2">{{ $service->name }}</td>
                                <td class="border px-4 py-2">{{ $service->date }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('garage.services.edit', [$vehicle, $service]) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('garage.services.destroy', [$vehicle, $service]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

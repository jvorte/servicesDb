<x-app-layout>
<x-slot name="header">
    <h2 class="flex items-center font-semibold text-xl text-gray-800 leading-tight gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-warehouse-icon lucide-warehouse">
            <path d="M18 21V10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v11" />
            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 1.132-1.803l7.95-3.974a2 2 0 0 1 1.837 0l7.948 3.974A2 2 0 0 1 22 8z" />
            <path d="M6 13h12" />
            <path d="M6 17h12" />
        </svg>
        {{ __('Garage') }}
    </h2>
</x-slot>


    <div class="py-6 max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">Select a vehicle:</h3>
            <a href="{{ route('garage.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-700">
                + Add Vehicle
            </a>
        </div>

        <div class="space-y-3">
            @foreach($vehicles as $vehicle)
            <div class="flex justify-between items-center p-4 bg-white border rounded-lg shadow-sm hover:bg-gray-50">
                <a href="{{ route('services.show', $vehicle) }}" class="flex-1 flex items-center space-x-2 truncate font-semibold text-gray-900">
                    {{-- SVG icon --}}
                    @switch($vehicle->type)
                    @case('car')
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-car-icon lucide-car">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2" />
                        <circle cx="7" cy="17" r="2" />
                        <path d="M9 17h6" />
                        <circle cx="17" cy="17" r="2" />
                    </svg>
                    @break
                    @case('boat')
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sailboat-icon lucide-sailboat">
                        <path d="M10 2v15" />
                        <path d="M7 22a4 4 0 0 1-4-4 1 1 0 0 1 1-1h16a1 1 0 0 1 1 1 4 4 0 0 1-4 4z" />
                        <path d="M9.159 2.46a1 1 0 0 1 1.521-.193l9.977 8.98A1 1 0 0 1 20 13H4a1 1 0 0 1-.824-1.567z" />
                    </svg>
                    @break
                    @case('moto')
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bike-icon lucide-bike">
                        <circle cx="18.5" cy="17.5" r="3.5" />
                        <circle cx="5.5" cy="17.5" r="3.5" />
                        <circle cx="15" cy="5" r="1" />
                        <path d="M12 17.5V14l-3-3 4-3 2 3h2" />
                    </svg>
                    @break
                    @default
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tractor-icon lucide-tractor">
                        <path d="m10 11 11 .9a1 1 0 0 1 .8 1.1l-.665 4.158a1 1 0 0 1-.988.842H20" />
                        <path d="M16 18h-5" />
                        <path d="M18 5a1 1 0 0 0-1 1v5.573" />
                        <path d="M3 4h8.129a1 1 0 0 1 .99.863L13 11.246" />
                        <path d="M4 11V4" />
                        <path d="M7 15h.01" />
                        <path d="M8 10.1V4" />
                        <circle cx="18" cy="18" r="2" />
                        <circle cx="7" cy="15" r="5" />
                    </svg>
                    @endswitch

                    <span>{{ $vehicle->brand }} {{ $vehicle->model }}</span>
                </a>

                <div class="flex items-center space-x-2">
                    <span class="text-gray-500">({{ $vehicle->year }})</span>

                <!-- Κουμπί -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $vehicle->id }}">
  Delete
</button>
                </div>
            </div>


<!-- Modal -->
<div class="modal fade" id="deleteModal-{{ $vehicle->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
      </div>
      <div class="modal-body">
        Do you want delete this Vehicle ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="{{ route('garage.destroy', $vehicle) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Yes, delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

            
            @endforeach
        </div>
    </div>
</x-app-layout>
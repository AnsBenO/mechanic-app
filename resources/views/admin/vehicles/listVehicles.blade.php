<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Manage Vehicles</h1>
                    <p><a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add New Vehicle</a></p>
                    @if ($vehicles->isEmpty())
                        <p>No vehicles found.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Fuel Type</th>
                                    <th>Registration</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr>
                                        <td>{{ $vehicle->id }}</td>
                                        <td>{{ $vehicle->make }}</td>
                                        <td>{{ $vehicle->model }}</td>
                                        <td>{{ $vehicle->fuelType }}</td>
                                        <td>{{ $vehicle->registration }}</td>
                                        <td>
                                            <a href="{{ route('vehicles.edit', $vehicle) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                data-vehicle-id="{{ $vehicle->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach

                              @include('admin.modals.deleteVehicle')

                                <script>
                                    var modal = document.getElementById("deleteModal");

                                    var deleteButtons = document.querySelectorAll('.delete-btn');

                                    var closeButton = document.getElementsByClassName("close")[0];

                                    deleteButtons.forEach(function(btn) {
                                        btn.onclick = function() {
                                            modal.style.display = "block";
                                        }
                                    });

                                    closeButton.onclick = function() {
                                        modal.style.display = "none";
                                    }

                                    window.onclick = function(event) {
                                        if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    }

                                    document.getElementById("confirmDeleteBtn").onclick = function() {
                                        var vehicleId = document.querySelector('.delete-btn').getAttribute('data-vehicle-id');

                                        fetch(`/vehicles/${vehicleId}`, {
                                                method: 'DELETE',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                },
                                            })
                                            .then(response => {
                                                if (response.ok) {
                                                    window.location.reload();
                                                } else {
                                                    alert('Failed to delete vehicle');
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                                alert('Failed to delete vehicle');
                                            });

                                        modal.style.display = "none";
                                    }
                                </script>
                            </tbody>
                        </table>
                        {{ $vehicles->links() }}

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

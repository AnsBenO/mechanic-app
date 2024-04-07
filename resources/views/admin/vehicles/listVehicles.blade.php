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
                                                data-vehicle-id="{{ $vehicle->id }}"
                                                onclick="showDeleteModal({{ $vehicle->id }})">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach

                                <div class="modalDiv">

                                </div>

                                <script>
                                    function showDeleteModal(vehicleId) {
                                        var modalContent = $(".modalDiv");

                                        $.ajax({
                                            url: `/vehicles/delete/${vehicleId}`,
                                            type: 'GET',
                                            success: function(response) {
                                                modalContent.html(response);
                                                $("#modal").show();
                                            },
                                            error: function(error) {
                                                console.error(error);
                                            }
                                        });
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

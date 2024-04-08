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
                    <div class="py-6">
                        <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-200 mb-6">Manage Vehicles
                        </h1>
                        <div class="flex justify-center">
                            <a href="{{ route('vehicles.create') }}"
                                class="btn btn-primary py-2 px-6 rounded-md text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 bg-blue-500 hover:bg-blue-600 text-white hover:text-white shadow-md">
                                Add New Vehicle
                            </a>
                        </div>
                    </div>

                    @if ($vehicles->isEmpty())
                        <p>No vehicles found.</p>
                    @else
                        <table class="table w-full border border-gray-300">
                            <thead>
                                <tr class="bg-gray-800 text-gray-200">
                                    <th class="px-4 py-2 border-r border-gray-300">#</th>
                                    <th class="px-4 py-2 border-r border-gray-300">Make</th>
                                    <th class="px-4 py-2 border-r border-gray-300">Model</th>
                                    <th class="px-4 py-2 border-r border-gray-300">Fuel Type</th>
                                    <th class="px-4 py-2 border-r border-gray-300">Registration</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-900">
                                        <td class="px-4 py-2 border border-gray-300">{{ $vehicle->id }}</td>
                                        <td class="px-4 py-2 border border-gray-300">{{ $vehicle->make }}</td>
                                        <td class="px-4 py-2 border border-gray-300">{{ $vehicle->model }}</td>
                                        <td class="px-4 py-2 border border-gray-300">{{ $vehicle->fuelType }}</td>
                                        <td class="px-4 py-2 border border-gray-300">{{ $vehicle->registration }}</td>
                                        <td class="px-4 py-2 flex justify-center gap-3">
                                            <a href="{{ route('vehicles.edit', $vehicle) }}"
                                                class="btn btn-sm btn-info inline-flex items-center px-3 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-indigo-200">
                                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M14.707 4.293a1 1 0 010 1.414L6.414 14.414a1 1 0 01-1.414-1.414L13.293 4.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Edit
                                            </a>

                                            <button type="button"
                                                class="btn btn-sm btn-danger inline-flex items-center px-3 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-red-200"
                                                onclick="showDeleteModal({{ $vehicle->id }})">
                                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 5.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Modal -->
                                <div class="modalDiv">
                                </div>
                            </tbody>
                        </table>


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
                        <div class="p-11">

                            {{ $vehicles->links() }}
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

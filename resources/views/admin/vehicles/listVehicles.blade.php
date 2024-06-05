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
                            <button onclick="showCreateModal()"
                                class="btn btn-primary py-2 px-6 rounded-md text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 bg-blue-500 hover:bg-blue-600 text-white hover:text-white shadow-md">
                                Add New Vehicle
                            </button>
                            <div class="createModalDiv">
                                {{-- ? create modal form here --}}
                            </div>
                            <!-- Modal -->
                            <div class="modalDiv">
                            </div>
                        </div>
                        <form action="{{ route('vehicles.search') }}" method="GET">
                            @csrf
                            <input type="text" name="query" placeholder="Search vehicles...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                    <table class="table w-full border border-gray-300">
                        <thead class="tableHead">
                            <tr class="bg-gray-800 text-gray-200">
                                <th class="px-4 py-2 border-r border-gray-300">#</th>
                                <th class="px-4 py-2 border-r border-gray-300">Make</th>
                                <th class="px-4 py-2 border-r border-gray-300">Model</th>
                                <th class="px-4 py-2 border-r border-gray-300">Fuel Type</th>
                                <th class="px-4 py-2 border-r border-gray-300">Registration</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        {{-- ? inserted tableBody here --}}



                    </table>

                    <script>
                        {{-- ? show modal --}}

                        function showCreateModal() {
                            var modalContent = $(".createModalDiv");

                            $.ajax({
                                url: `/vehicles/create`,
                                type: 'GET',
                                success: function(response) {
                                    modalContent.html(response);
                                    $("#createModal").show();
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });

                        }

                        // Function to handle search
                        function searchVehicles() {
                            var query = $('input[name="query"]').val();
                            var tHead = $('.tableHead');

                            $.ajax({
                                url: `/vehicles/search?query=${query}`,
                                type: 'GET',
                                success: function(response) {
                                    tHead.after(response);
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });
                        }

                        // Call searchVehicles function on form submit
                        $('form').submit(function(e) {
                            e.preventDefault();
                            searchVehicles();
                        });

                        $(document).ready(function() {
                            searchVehicles('');
                        });

                        function showDeleteModal(vehicleId) {
                            var modalContent = $(".modalDiv");
                            console.log(vehicleId);


                            $.ajax({
                                url: `/vehicles/delete/${vehicleId}`,
                                type: 'GET',
                                success: function(response) {
                                    modalContent.html(response);
                                    $("#deleteModal").show();
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });
                        }

                        function showEditModal(vehicleId) {
                            var modalContent = $(".modalDiv");

                            $.ajax({
                                url: `/vehicles/${vehicleId}/edit`,
                                type: 'GET',
                                success: function(response) {
                                    modalContent.html(response);
                                    $("#editModal").show();
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });

                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

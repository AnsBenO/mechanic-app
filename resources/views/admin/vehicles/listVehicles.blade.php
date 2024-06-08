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
                        <div class="createModalDiv">
                            {{-- ? create vehicle modal --}}
                        </div>
                        <div class="modalDiv">

                            {{-- ? modal content here --}}
                        </div>



                        <div class="flex justify-center mb-6 gap-2">
                            <button onclick="showCreateModal()"
                                class="btn btn-primary py-2 px-6 rounded-md text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 bg-amber-500 hover:bg-amber-600 text-white hover:text-white shadow-md">
                                Add New Vehicle
                            </button>
                            <button onclick="showImportModal()"
                                class="btn btn-primary py-2 px-6 rounded-md text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 bg-amber-500 hover:bg-amber-600 text-white shadow-md">
                                Import Vehicles
                            </button>
                            <button onclick="exportVehicles()"
                                class="btn btn-primary py-2 px-6 rounded-md text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 bg-amber-500 hover:bg-amber-600 text-white shadow-md">
                                Export Vehicles
                            </button>
                        </div>

                        <form action="{{ route('vehicles.search') }}" method="GET" class="w-full max-w-sm mt-12">
                            @csrf
                            <div class="flex items-center border-b border-amber-500 py-2">
                                <input type="text" name="query" placeholder="Search vehicles..."
                                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none dark:text-gray-200">
                                <button type="submit"
                                    class="flex-shrink-0 bg-amber-500 hover:bg-amber-600 border-amber-500 hover:border-amber-600 text-sm border-4 text-white py-1 px-2 rounded">
                                    Search
                                </button>
                            </div>
                        </form>

                        <table class="table w-full border border-gray-300 mt-6">
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
                            <tbody class="tableBody">

                            </tbody>
                        </table>

                        {{-- ? Pagination section  --}}
                        <nav role="navigation" aria-label="Pagination Navigation"
                            class="flex items-center justify-between">
                            <div class="flex justify-between flex-1 sm:hidden">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                                    « Previous
                                </span>
                                <a href="#"
                                    class="pagination-link relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                    data-page="2">
                                    Next »
                                </a>
                            </div>

                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                                        Showing <span class="font-medium">1</span> to <span
                                            class="font-medium">10</span> of <span class="font-medium">63</span> results
                                    </p>
                                </div>
                                <div>
                                    <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                                        <span aria-disabled="true" aria-label="&laquo; Previous">
                                            <span
                                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5 dark:bg-gray-800 dark:border-gray-600"
                                                aria-hidden="true">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <a href="#"
                                            class="pagination-link relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                            data-page="1">1</a>
                                        <a href="#"
                                            class="pagination-link relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                            data-page="2">2</a>
                                        <a href="#"
                                            class="pagination-link relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                            data-page="3">3</a>
                                        <a href="#"
                                            class="pagination-link relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                            data-page="4">4</a>
                                        <a href="#"
                                            class="pagination-link relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                            data-page="5">5</a>
                                        <a href="#"
                                            class="pagination-link relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                            data-page="6">6</a>
                                        <a href="#"
                                            class="pagination-link relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                            data-page="7">7</a>
                                        <a href="#"
                                            class="pagination-link relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                            aria-label="Next »" data-page="2">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </nav>

                    </div>

                    <script>
                        $(document).ready(function() {
                            $('.pagination-link').on('click', function(e) {
                                e.preventDefault();
                                let page = $(this).data('page');
                                var tBody = $('.tableBody');

                                $.ajax({
                                    url: `/vehicles/search?page=${page}`,
                                    method: 'GET',
                                    success: function(response) {
                                        tBody.html(response.html);
                                        console.log(response);
                                    },
                                    error: function(xhr) {
                                        console.error('Error fetching page ' + page);
                                    }
                                });
                            });
                        });

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

                        function showImportModal() {
                            $.ajax({
                                url: "/vehicles/import",
                                method: "GET",
                                success: function(response) {
                                    $('.modalDiv').html(response);
                                    console.log(response);
                                    $('#importModal').show();
                                },
                                error: function(xhr, status, error) {
                                    alert(`Failed to load the import view. ${error} (${xhr.status} - ${xhr.statusText})`);
                                }
                            });
                        }

                        function exportVehicles() {
                            window.location.href = '/vehicles/export';
                        }

                        function searchVehicles() {
                            var query = $('input[name="query"]').val();
                            var tBody = $('.tableBody');

                            $.ajax({
                                url: `/vehicles/search?query=${query}`,
                                type: 'GET',
                                success: function(response) {
                                    tBody.html(response.html);
                                    $('.pagination').html(response.pagination);
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });
                        }

                        $('form').submit(function(e) {
                            e.preventDefault();
                            searchVehicles();
                        });

                        $(document).ready(function() {
                            searchVehicles();
                        });

                        function showDeleteModal(vehicleId) {
                            var modalContent = $(".modalDiv");

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

<div id="editModal" class="modal fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50" data-aos="fade-down">
    <!-- Modal content -->
    <div id="modal-content" class="modal-content bg-white dark:bg-gray-800 shadow-xl px-1 rounded-lg">
        <div class="flex justify-end">
            <button id="close-modal" class="close cursor-pointer text-gray-400 hover:text-gray-500 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="block text-center mb-4">Edit Vehicle</h2>
            <form id="editForm">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <x-input-label for="make" :value="__('Make')" />
                    <x-text-input id="make" class="form-control" type="text" name="make" :value="$vehicle->make" required />
                </div>
                <div class="mb-4">
                    <x-input-label for="model" :value="__('Model')" />
                    <x-text-input id="model" class="form-control" type="text" name="model" :value="$vehicle->model" required />
                </div>
                <div class="mb-4">
                    <x-input-label for="fuelType" :value="__('Fuel Type')" />
                    <x-text-input id="fuelType" class="form-control" type="text" name="fuelType" :value="$vehicle->fuelType" required />
                </div>
                <div class="mb-4">
                    <x-input-label for="registration" :value="__('Registration')" />
                    <x-text-input id="registration" class="form-control" type="text" name="registration" :value="$vehicle->registration" required />
                </div>
                <div class="mb-4">
                    <x-input-label for="photos" :value="__('Photos')" />
                    <input type="file" class="form-control" id="photos" name="photos" />
                </div>
                <div class="flex justify-center space-x-4">
                    <button id="edit-button"
                        class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Edit
                    </button>
                    <button id="cancel-button"
                        class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#edit-button").click(function(e) {
            e.preventDefault();
            var formData = new FormData($('#editForm')[0]);
            var vehicleId = $("#deleteId").val();

            $.ajax({
                url: `/vehicles/${vehicleId}`,
                type: 'PUT',
                data: formData,
                contentType: false,
                processData: false,
                error: function(error) {
                    console.error(error);
                }
            });
        });

        $("#close-modal, #cancel-button").click(function() {
            $("#editModal").hide();
        });
    });
</script>

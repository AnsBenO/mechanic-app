<div id="modal" class="modal fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
    data-aos="fade-down">
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
        <div class="p-2 flex flex-col gap-5">

            <div class="flex items-center justify-center">
                <svg class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
            <div class="text-center">
                <p class="text-lg text-gray-800 dark:text-gray-200">Are you sure you want to delete this vehicle?</p>
            </div>
            <div class="flex justify-center space-x-4">
                <form id="deleteForm">
                    @csrf
                    <input type="hidden" id="deleteId" name="deleteId" value="{{ $vehicleId }}" />
                    <button id="delete-button"
                        class="bg-transparent hover:bg-red-500 text-red-500 font-semibold hover:text-white py-1 px-4 border border-red-500 hover:border-transparent rounded-lg transition duration-300 ease-in-out">
                        Delete
                    </button>
                </form>
                <button id="cancel-button"
                    class="bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded-lg transition duration-300 ease-in-out">
                    Cancel
                </button>


            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#delete-button").click(function() {
            var vehicleId = $("#deleteId").val();

            $.ajax({
                url: `/vehicles/${vehicleId}`,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
        $("#close-modal, #cancel-button").click(function() {
            $("#modal").hide();
        });
    });
</script>

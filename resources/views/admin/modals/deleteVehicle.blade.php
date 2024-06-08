<div id="deleteModal" class="modal fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50"
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
                        class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Delete
                    </button>
                </form>
                <button id="cancel-button"
                    class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
            $("#deleteModal").hide();
        });
    });
</script>

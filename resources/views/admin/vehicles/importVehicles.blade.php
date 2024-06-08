<div id="importModal" class="modal fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50"
    data-aos="fade-down">
    <!-- Modal content -->
    <div id="modal-content" class="modal-content bg-white dark:bg-gray-800 shadow-xl px-1 rounded-lg">
        <div class="flex justify-end">
            <button id="close-import-modal"
                class="close cursor-pointer text-gray-400 hover:text-gray-500 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="block text-center mb-4">Import Vehicles</h2>
            <form action="/vehicles/import" method="POST" enctype="multipart/form-data" id="importForm">
                @csrf
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to
                                    upload</span> or drag and drop</p>
                        </div>
                        <input id="dropzone-file" type="file" name="excel_file" class="hidden" required />
                    </label>
                </div>
                <div class="flex justify-center space-x-4 mt-4">
                    <button id="import-button"
                        class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Import
                    </button>
                    <button id="cancel-import-button"
                        class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#import-button").click(function(e) {
            e.preventDefault();
            var formData = new FormData($('#importForm')[0]);

            $.ajax({
                url: "/vehicles/import",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

        $("#close-import-modal, #cancel-import-button").click(function() {
            $("#importModal").hide();
        });
    });
</script>

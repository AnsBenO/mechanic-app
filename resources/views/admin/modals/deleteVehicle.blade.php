<div id="modal" class="modal" style="display: none;">
    <!-- Modal content -->
    <div id="modal-content" class="modal-content">
        <div class="modal-header">
            <span id="close-modal" class="close cursor-pointer">&times;</span>
            <h2>Delete</h2>
        </div>
        <div class="modal-body">
            <form id="deleteForm">
                @csrf
                <input type="hidden" id="deleteId" name="deleteId" />
                <p>Are you sure you want to delete this vehicle?</p>
            </form>
        </div>
        <div class="modal-footer">
            <button id="delete-button" class="btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            <button id="cancel-button" class="btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById("modal");
        modal.style.display = 'hidden';
        var closeModal = document.getElementById("close-modal");
        var deleteButton = document.getElementById("delete-button");
        var cancelButton = document.getElementById("cancel-button");
        var deleteIdInput = document.getElementById("deleteId");

        closeModal.addEventListener("click", function() {
            modal.style.display = "none";
        });

        cancelButton.addEventListener("click", function() {
            modal.style.display = "none";
        });

        deleteButton.addEventListener("click", function() {
            var formData = new FormData(document.getElementById('deleteForm'));
            axios.delete('{{ route("vehicles.destroy") }}', formData)
                .then(function (response) {
                    if(response.data == "ok") {
                        var rowToDelete = document.getElementById("row" + deleteIdInput.value);
                        if (rowToDelete) {
                            rowToDelete.remove();
                        }
                    }
                })
                .catch(function (error) {
                    console.error(error);
                });

            modal.style.display = "none";
        });
    });
</script>
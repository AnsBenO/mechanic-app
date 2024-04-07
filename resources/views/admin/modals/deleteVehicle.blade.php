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
                <input type="hidden" id="deleteId" name="deleteId" value="{{ $vehicleId }}" />
                <p>Are you sure you want to delete this vehicle {{ $vehicleId }}?</p>
            </form>
        </div>
        <div class="modal-footer">
            <button id="delete-button"
                class="btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            <button id="cancel-button"
                class="btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
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

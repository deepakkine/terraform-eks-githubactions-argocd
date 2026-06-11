<!-- Bootstrap Confirm Modal (Used for delete / actions) -->
<div class="modal fade" id="confirmModal" tabindex="-1">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Confirm Action</h5>

                <!-- Close button (must be inside header) -->
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                Are you sure you want to perform this action?
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <!-- Confirm button (dynamic URL set from JS) -->
                <a id="confirmBtn" href="#" class="btn btn-danger">Yes</a>

                <!-- Cancel button -->
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>
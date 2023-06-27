<div>
    <form wire:submit.prevent="update">
        <div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3 align-items-end">
                            <div>
                                <label class="form-label">Category Name</label>
                                <input wire:model.defer="category.name" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script data-turbo-eval="false" data-turbolinks-eval="false">
        document.addEventListener('openEditModal', (event) => {
            $('#modal-edit').modal('show');
        })
    </script>
</div>


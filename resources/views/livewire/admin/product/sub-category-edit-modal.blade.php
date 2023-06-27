<div>
    <form wire:submit.prevent="update">
        <div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Sub Category Name</label>
                            <div class="col">
                                <input wire:model.defer="subcategory.name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Parent Category</label>
                            <div class="col">
                                <select wire:model.defer="subcategory.category_id" class="form-control form-select @error('category_id') is-invalid @enderror">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($categories as $id => $category)
                                    <option value="{{ $id }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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


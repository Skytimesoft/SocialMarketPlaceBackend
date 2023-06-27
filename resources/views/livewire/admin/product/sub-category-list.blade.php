<div>
    <div class="container-xl mt-2">
        @if($alert)
            @livewire('components.alert', ['type' => $alertType, 'message' => $alertMessage])
        @endif
    </div>

    <div class="divide-y">
        <div class="page-body px-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Sub Category</h3>
                </div>
                <form wire:submit.prevent="createSubCategory" autocomplete="off">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Sub Category Name</label>
                            <div class="col">
                                <input wire:model.defer="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Parent Category</label>
                            <div class="col">
                                <select wire:model.defer="category_id" class="form-control form-select @error('category_id') is-invalid @enderror">
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
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary w-20">
                                    Create
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="page-body px-3">
            <div class="mb-3 d-print-none">
                <h2 class="page-title">{{ __('Sub Categories') }}</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <livewire:sub-category-table />
                </div>
            </div>
        </div>
    </div>

    <livewire:admin.product.sub-category-edit-modal />
    <livewire:admin.product.sub-category-delete-modal />
</div>

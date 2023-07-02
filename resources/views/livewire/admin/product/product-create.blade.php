<div>

    <div class="container-xl mt-2">
        @if($alert)
        @livewire('components.alert', ['type' => $alertType, 'message' => $alertMessage])
        @endif
    </div>

    <div class="page-body px-3">
        <form wire:submit.prevent="createNewProduct" autocomplete="off">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Product</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Title</label>
                        <div class="col">
                            <input wire:model.defer="product.title" type="text" class="form-control" placeholder="Enter Title" required>
                            @error('product.title')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Description</label>
                        <div class="col">
                            @livewire('components.tiny-m-c-e', ['inputName' => 'description'])
                            @error('product.description')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Category</label>
                        <div class="col">
                            <select wire:model="product.category_id" class="form-control form-select" >
                                <option value="default">Select a category</option>
                                @foreach ($categories as $id => $category)
                                <option value="{{ $id }}">{{ $category }}</option>
                                @endforeach
                            </select>
                            @error('product.category_id')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @if($isCategorySelected)
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label">Sub Category</label>
                        <div class="col">
                            <select wire:model.defer="product.sub_category_id" class="form-control form-select">
                                @if(count($subcategories) > 0)
                                    <option value="default">Select a sub category</option>
                                    @foreach($subcategories as $id => $category)
                                    <option value="{{ $id }}">{{ $category }}</option>
                                    @endforeach
                                @else
                                    <option>No sub category found</option>
                                @endif
                            </select>
                            @error('product.sub_category_id')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Price (per pc)</label>
                        <div class="col">
                            <input wire:model="product.price" type="number" class="form-control @error('name') is-invalid @enderror" min="0" step="0.001" />
                            @error('product.price')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary w-20">
                        Upload
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>

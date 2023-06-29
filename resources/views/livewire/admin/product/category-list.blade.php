<div>
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between">
                <h2 class="page-title">
                    {{ __('Categories (Platform/Social Media)') }}
                </h2>
                <a wire:click="openNewCategoryModal" class="btn btn-primary w-20">
                    Add New Category
                </a>
            </div>
        </div>
    </div>

    <div class="page-body px-3">
        <div class="card">
            <div class="card-body">
                <livewire:category-table />
            </div>
        </div>
    </div>

    <livewire:admin.product.category-new-modal />
    <livewire:admin.product.category-edit-modal />
    <livewire:admin.product.category-delete-modal />
</div>

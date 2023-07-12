<div>
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between">
                <h2 class="page-title">
                    {{ __('Products (Batch Accounts)') }}
                </h2>
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary w-20">
                    Upload New
                </a>
            </div>
        </div>
    </div>

    <div class="page-body px-3">
        <div class="card">
            <div class="card-body">
                <livewire:product-table />
            </div>
        </div>
    </div>

    <livewire:admin.product.product-delete-modal />
</div>

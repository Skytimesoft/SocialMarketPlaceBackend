<div>
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between">
                <h2 class="page-title">
                    {{ __('Coupons') }}
                </h2>
                <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary w-20">
                    Create New
                </a>
            </div>
        </div>
    </div>

    <div class="page-body px-3">
        <div class="card">
            <div class="card-body">
                <livewire:coupon-table />
            </div>
        </div>
    </div>

    <livewire:admin.coupon.coupon-delete-modal />
</div>

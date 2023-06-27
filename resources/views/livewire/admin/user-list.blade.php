<div>
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Users') }}
            </h2>
        </div>
    </div>

    <div class="page-body px-3">
        <div class="card">
            <div class="card-body">
                <livewire:user-table />
            </div>
        </div>
    </div>

    <livewire:admin.user-delete-modal />
</div>

<div>
    <div class="container-xl mt-2">
        @if($alert)
        @livewire('components.alert', ['type' => $alertType, 'message' => $alertMessage])
        @endif
    </div>

    <div class="container-xl">
        <div class="page-header d-print-none">
            <h3 class="">
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item">{{ __('Site Settings') }}</li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ __('Link Storage') }}</a></li>
                </ol>
            </h3>
        </div>
    </div>

    <div class="page-body px-3">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Link Storage</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active">
                            <p>After first installation of project.</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action active">
                            <p>If images aren't working properly.</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button wire:click="linkStorage" class="btn btn-primary">Link</button>
            </div>
        </div>
    </div>

</div>

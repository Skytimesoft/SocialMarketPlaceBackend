<div>

    <div class="container-xl">
        <div class="page-header d-print-none">
            <h3 class="">
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item">{{ __('Site Settings') }}</li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ __('Site Logo') }}</a></li>
                </ol>
            </h3>
        </div>
    </div>

    <div class="page-body px-3">
        <div class="card">
            <form wire:submit.prevent="update">
                <div class="card-header d-flex justify-content-center">
                    <h3 class="card-title">Update Site Logo</h3>
                </div>
                <div class="card-body">
                    <div class="mb-6" style="height: 200px;">
                        @if ($logoFound)
                        <img src="{{ Vite::asset($logoUrl) }}" style="max-width: 100%; max-height: 100%;" alt="Logo">
                        @else
                        <img src="" alt="Logo not found">
                        @endif
                    </div>
                    <div class="mb-3">
                        <div class="form-label required">Logo (only png files supported | max size: 1 MB)</div>
                        <input wire:model="logo" type="file" class="form-control">
                        @error('logo')
                        <div class="invalid-feedback" style="display: block !important;"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>

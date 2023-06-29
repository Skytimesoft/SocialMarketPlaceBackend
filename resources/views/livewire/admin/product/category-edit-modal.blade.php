<div>

    <div class="modal modal-blur fade {{ $class }}" id="modal-new" style="{{ $style }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="update">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Category</h5>
                        <button wire:click="closeModal" type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div>
                                <label class="form-label required">Name</label>
                                <input wire:model.defer="category.name" type="text" class="form-control" />
                                @error('category.name')
                                <div class="invalid-feedback" style="display: block !important;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if (optional($category)->logo)
                        @php
                            $logoUrl = 'public/storage/' . $category->logo;
                        @endphp
                        <div class="mb-3">
                            <div class="form-label">Current Logo</div>
                            <span class="avatar avatar-md" style="background-image: url({{ Vite::asset($logoUrl) }})"></span>
                        </div>
                        @endif
                        <div class="mb-3">
                            <div class="form-label required">Logo (Max. file size: 256 KB)</div>
                            <input wire:model="logo" type="file" class="form-control">
                            @error('logo')
                            <div class="invalid-feedback" style="display: block !important;"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="closeModal" type="button" class="btn me-auto">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

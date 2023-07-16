<div>

    <div class="container-xl mt-2">
        @if($alert)
        @livewire('components.alert', ['type' => $alertType, 'message' => $alertMessage])
        @endif
    </div>

    <div class="page-body px-3">
        <form wire:submit.prevent="createCoupon" autocomplete="off">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Coupon</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Code</label>
                        <div class="col">
                            <input wire:model.defer="coupon.code" type="text" class="form-control" placeholder="Enter Coupon Code" required>
                            @error('coupon.code')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Value</label>
                        <div class="col">
                            <input wire:model.defer="coupon.value" type="number" class="form-control" min="1" step="1" placeholder="Enter Discount Amount" />
                            @error('coupon.value')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Status</label>
                        <div class="col">
                            <select wire:model.defer="coupon.is_enabled" class="form-control form-select" >
                                <option value="">Choose Status</option>
                                <option value="1">Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                            @error('coupon.is_enabled')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label">Quantity</label>
                        <div class="col">
                            <input wire:model.defer="coupon.quantity" type="number" class="form-control" min="1" step="1" placeholder="Enter Available Quantity" />
                            @error('coupon.quantity')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary w-20">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>

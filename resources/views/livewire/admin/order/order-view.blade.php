<div>
    <div class="container-xl mt-2">
        @if($alert)
        @livewire('components.alert', ['type' => $alertType, 'message' => $alertMessage])
        @endif
    </div>

    <div class="container-xl">
        <div class="page-header d-print-none">
            <h3 class="">
                {{ __('Order Details') }}
            </h3>
        </div>
    </div>

    <div class="page-body px-3">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Product Information</h3>
            </div>
            <div class="card-body">
                <div class="flex flex-col">
                    <div class="inline-flex mt-2 items-center">
                        <label class="text-sm font-medium text-gray-900 dark:text-gray-300 w-40">
                            Product Name:
                        </label>
                        <span class="w-full ms-4">{{ $product->title }}</span>
                    </div>
                    <div class="inline-flex mt-2 items-center">
                        <label class="text-sm font-medium text-gray-900 dark:text-gray-300 w-40">
                            Stock Available:
                        </label>
                        <span class="w-full ms-4">{{ $product->stock }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Order Information</h3>
            </div>
            <div class="card-body">
                <div class="flex flex-col">
                    <div class="mb-3 row align-items-center">
                        <label class="col-3 col-form-label">
                            Unique Code:
                        </label>
                        <div class="col">
                            <span>{{ $order->unique_id }}</span>
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label class="col-3 col-form-label">
                            Coupon Discount ({{ $order->amount_currency }}):
                        </label>
                        <div class="col">
                            @if ($order->coupon_id)
                            <span>{{ $coupon->value }}</span>
                            <span class="ms-2">({{ $coupon->code }})</span>
                            @else
                            <span class="fst-italic">Not Provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label for="quantity" class="col-3 col-form-label">
                            Quantity:
                        </label>
                        <div class="col">
                            <input wire:model="order.quantity" type="number" name="quantity" value="{{ $order->quantity }}" step="1" min="1" class="form-control" />
                            @error('order.quantity')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label class="col-3 col-form-label">
                            Total Amount ({{ $order->amount_currency }}):
                        </label>
                        <div class="col">
                            <span>{{ $amountString }}</span>
                        </div>
                    </div>
                    <div class="mb-3 row align-items-center">
                        <label for="countries" class="col-3 col-form-label required">
                            Status:
                        </label>
                        <div class="col">
                            <select wire:model="order.status" id="status" class="form-control form-select">
                                @foreach (App\Enums\OrderStatus::cases() as $case)
                                <option value="{{ $case->value }}" {{ ($order->status->value == $case->value) ? 'selected' : '' }}>
                                    {{ $case->value }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button wire:click="updateOrder" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>

</div>

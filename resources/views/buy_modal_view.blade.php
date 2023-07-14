<div class="flex flex-col">
    <div class="inline-flex mt-4 items-center">
        <label class="text-sm font-medium text-gray-900 dark:text-gray-300 w-40">
            Product
        </label>
        <span class="w-full">{{ $product->title }}</span>
    </div>
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="inline-flex mt-4 items-center">
        <label class="text-sm font-medium text-gray-900 dark:text-gray-300 w-40">
            Quantity
        </label>
        <input type="number" name="quantity" x-on:input.change.debounce="updatePrice($event)" step="1" min="1" value="1" class="w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="inline-flex mt-4 items-center">
        <label class="text-sm font-medium text-gray-900 dark:text-gray-300 w-40">
            Coupon (optional)
        </label>
        <input type="text" name="coupon" class="w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
</div>


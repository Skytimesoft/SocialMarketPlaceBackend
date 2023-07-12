<?php

namespace App\Services;

use Brick\Money\Money;
use App\Models\Product;
use Brick\Math\RoundingMode;
use Illuminate\Support\Facades\Log;
use Brick\Money\Context\CustomContext;

class OrderService
{
    /**
     * @param  Product  $product
     * @param  int  $quantity
     * @param  null|int  $couponId
     *
     * @return  string  $total
     */
    public static function calculateTotalAmount(Product $product, int $quantity, ?int $couponId)
    {
        $price = Money::of(strval($product->price), 'USD', new CustomContext(4));
        $total = $price->multipliedBy($quantity, RoundingMode::UP);

        return $total->getAmount();
    }
}
<?php

namespace App\Services;

use App\Models\Order;
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
     *
     * @return  string  $total
     */
    public static function calculateTotalAmount(Product $product, int $quantity)
    {
        $price = Money::of(strval($product->price), 'USD', new CustomContext(4));
        $totalMoneyObject = $price->multipliedBy($quantity, RoundingMode::UP);

        return $totalMoneyObject->getAmount();
    }

    /**
     * @param  Order  $order
     * @param  string  $coupon
     *
     * @return Order  $order
     */
    public static function applyCoupon(Order $order, ?string $coupon)
    {
        if (!isset($coupon)) {
            return $order;
        }

        $order->verifyCouponOr($coupon, function ($code, $exception) use ($order) {
            return $order;
        });

        $couponModel = $order->redeemCouponOr($coupon, function ($code, $exception) use ($order) {
            return $order;
        });

        $amount = Money::of(strval($order->total_amount), 'USD', new CustomContext(4));
        $totalMoneyObject = $amount->minus($couponModel->value, RoundingMode::UP);
        $order->total_amount = $totalMoneyObject->getAmount();
        $order->coupon_id = $couponModel->id;

        return $order;
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $this->validate($request, [
            'product_id' => "required|numeric",
            'coupon' => "nullable",
            'quantity' => "required|integer",
        ]);

        $user = auth()->user();
        $product = Product::find($request->product_id);

        if (is_null($product) || $product->stock < $request->quantity) {
            abort(400);
        }

        $order = Order::create([
            'unique_id' => Order::getUniqueOrderId(),
            'user_id' => $user->id,
            'product_id' => $product->id,
            'status' => OrderStatus::Pending,
            'quantity' => $request->quantity,
            'total_amount' => OrderService::calculateTotalAmount($product, $request->quantity),
        ]);

        $order = OrderService::applyCoupon($order, $request->coupon);
        $order->save();

        $product->stock = $product->stock - $request->quantity;
        $product->save();

        return view('order_placed', compact('order'));
    }

    public function modalView($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return "Not Found!";
        }

        return view('buy_modal_view', compact('product'))->render();
    }
}

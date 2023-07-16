<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Validation\Rules\Enum;
use MichaelRubel\Couponables\Models\Coupon;

class OrderView extends Component
{
    public $alert = false;

    public $alertType = '';

    public $alertMessage = '';

    public Order $order;

    public Product $product;

    public Coupon $coupon;

    public $amountString = '';

    public function rules()
    {
        return [
            'order.quantity' => 'required|integer|min:1|max:' . strval((int) $this->order->quantity + (int) $this->product->stock),
            'order.status' => [new Enum(OrderStatus::class)],
        ];
    }

    public function mount(Request $request)
    {
        $this->order = Order::find($request->id);
        $this->amountString = (string) $this->order->total_amount;

        if (isset($this->order->product_id)) {
            $this->product = Product::find($this->order->product_id);
        }

        if (isset($this->order->coupon_id)) {
            $this->coupon = Coupon::find($this->order->coupon_id);
        }
    }

    public function updatedOrderQuantity()
    {
        if (strlen(strval($this->order->quantity)) < 1) {
            return false;
        }

        $this->amountString = (string) OrderService::calculateTotalAmount($this->product, $this->order->quantity);

        if (isset($this->order->coupon_id)) {
            $final_amount = OrderService::subtractDiscountFromAmount($this->amountString, $this->coupon->value);
            $this->amountString = (string) $final_amount;

            if ($final_amount->isNegative()) {
                $this->amountString = strval(0);
            }
        }
    }

    public function updateOrder()
    {
        $this->validate();
        $this->order->total_amount = $this->amountString;

        $originalQuantity = $this->order->getOriginal('quantity');
        $totalStock = (int) $this->product->stock + (int) $originalQuantity;
        $updatedStock = $totalStock - (int) $this->order->quantity;
        $this->product->stock = $updatedStock;

        $this->product->save();
        $this->order->save();

        $this->alert = false;
        $this->alertType = 'success';
        $this->alertMessage = 'Order updated successfully!';
        $this->alert = true;

        $this->emit('refreshChildren', $this->alertType, $this->alertMessage);
    }

    public function render()
    {
        return view('livewire.admin.order.order-view');
    }
}

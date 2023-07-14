<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Buyer\OrderResource;

class OrderController extends Controller
{
    public function show(Request $request)
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(15);

        return OrderResource::collection($orders);
    }
}

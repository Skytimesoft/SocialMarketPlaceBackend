<?php

namespace App\Http\Resources\Buyer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'unique_id' => $this->unique_id,
            'user_id' => $this->user_id,
            'coupon_id' => $this->coupon_id,
            'product' => $this->product,
            'status' => $this->status,
            'quantity' => $this->quantity,
            'amount_currency' => $this->amount_currency,
            'total_amount' => $this->total_amount,
            'downloadable' => $this->downloadable,
        ];
    }
}

<?php

namespace App\Models;

use App\Models\Product;
use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MichaelRubel\Couponables\Traits\HasCoupons;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, HasCoupons;

    protected $fillable = ['unique_id', 'user_id', 'product_id', 'downloadable', 'status', 'quantity', 'total_amount'];

    protected $casts = [
        'status' => OrderStatus::class
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get unique id for order
     *
     * @return string
     */
    public static function getUniqueOrderId()
    {
        $lastEntry = Order::latest()->first();

        if (isset($lastEntry)) {
            $newId = strval(intval($lastEntry->id) + 1);
        } else {
            $newId = '1';
        }

        return 'ORD-' . $newId;
    }
}

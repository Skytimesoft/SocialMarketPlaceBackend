<?php

namespace App\Models;

use App\Events\ProductUpdated;
use App\Models\ProductSubscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'price', 'category_id', 'sub_category_id', 'owner_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(ProductSubscription::class);
    }

    public function updateModel(Product $product)
    {
        $dirtyProperties = $product->getDirty();

        if (array_key_exists('price', $dirtyProperties) || array_key_exists('stock', $dirtyProperties)) {
            event(new ProductUpdated($product));
        }

        $product->save();
    }

    public function clearFootprints()
    {
        //
    }

    public function subscribe($userId = null)
    {
        $this->subscriptions()->create([
            'user_id' => $userId ?: auth()->id()
        ]);

        return $this;
    }

    public function unsubscribe($userId = null)
    {
        $this->subscriptions()->where('user_id', $userId ?: auth()->id())->delete();
    }
}

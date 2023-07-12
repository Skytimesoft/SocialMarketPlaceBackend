<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo'];

    public function childs(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function deleteLogo()
    {
        $path = $this->logo ?? '';

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            $this->logo = null;
        }
    }

    public function clearFootprints()
    {
        $this->deleteLogo();
        $this->childs->each->delete();
    }
}

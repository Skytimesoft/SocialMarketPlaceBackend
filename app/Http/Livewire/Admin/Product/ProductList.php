<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    protected $listeners = [
        'openProductDeleteModal' => 'openProductDeleteModal',
        'refreshComponent' => 'refreshChildren'
    ];

    public function refreshChildren()
    {
        $this->emit('refreshChildren');
    }

    public function openProductDeleteModal(Product $product)
    {
        $this->emit('productDeleteModal', $product);
    }

    public function render()
    {
        return view('livewire.admin.product.product-list');
    }
}

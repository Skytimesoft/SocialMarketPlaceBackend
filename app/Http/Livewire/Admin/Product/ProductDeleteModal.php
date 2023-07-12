<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class ProductDeleteModal extends Component
{
    public Product $product;

    public $confirmDelete = false;

    protected $listeners = ['productDeleteModal' => 'productDeleteModal'];

    public function productDeleteModal(Product $product)
    {
        $this->product = $product;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function updatedConfirmDelete()
    {
        if ($this->confirmDelete) {
            $this->product->clearFootprints();
            $this->product->delete();
            $this->emitUp('refreshComponent');
        }
    }

    public function render()
    {
        return view('livewire.admin.product.product-delete-modal');
    }
}

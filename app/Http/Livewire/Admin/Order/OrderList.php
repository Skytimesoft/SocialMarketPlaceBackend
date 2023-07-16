<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;

class OrderList extends Component
{
    /*     protected $listeners = [
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
        } */

    public function render()
    {
        return view('livewire.admin.order.order-list');
    }
}

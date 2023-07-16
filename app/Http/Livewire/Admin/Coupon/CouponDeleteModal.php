<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use MichaelRubel\Couponables\Models\Coupon;

class CouponDeleteModal extends Component
{
    public Coupon $coupon;

    public $confirmDelete = false;

    protected $listeners = ['couponDeleteModal' => 'couponDeleteModal'];

    public function couponDeleteModal(Coupon $coupon)
    {
        $this->coupon = $coupon;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function updatedConfirmDelete()
    {
        if ($this->confirmDelete) {
            $this->coupon->delete();
            $this->emitUp('refreshComponent');
        }
    }

    public function render()
    {
        return view('livewire.admin.coupon.coupon-delete-modal');
    }
}

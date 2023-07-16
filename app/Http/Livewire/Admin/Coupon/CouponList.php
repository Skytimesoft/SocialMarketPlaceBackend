<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use MichaelRubel\Couponables\Models\Coupon;

class CouponList extends Component
{
    protected $listeners = [
        'openCouponDeleteModal' => 'openCouponDeleteModal',
        'refreshComponent' => 'refreshChildren'
    ];

    public function refreshChildren()
    {
        $this->emit('refreshChildren');
    }

    public function openCouponDeleteModal(Coupon $coupon)
    {
        $this->emit('couponDeleteModal', $coupon);
    }

    public function render()
    {
        return view('livewire.admin.coupon.coupon-list');
    }
}

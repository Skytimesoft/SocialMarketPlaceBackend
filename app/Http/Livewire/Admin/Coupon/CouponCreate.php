<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use MichaelRubel\Couponables\Models\Coupon;

class CouponCreate extends Component
{
    public $alert = false;

    public $alertType = '';

    public $alertMessage = '';

    public Coupon $coupon;

    public function rules()
    {
        return [
            'coupon.code' => 'required|string|max:64|unique:coupons,code',
            'coupon.value' => 'required|numeric',
            'coupon.is_enabled' => 'required',
            'coupon.limit' => 'nullable|numeric',
        ];
    }

    protected $messages = [
        'coupon.is_enabled.required' => 'Please choose a status.',
    ];

    public function mount()
    {
        $this->coupon = new Coupon;
    }

    public function createCoupon()
    {
        $this->validate();
        $this->coupon->save();

        $this->alert = false;
        $this->alertType = 'success';
        $this->alertMessage = 'Coupon created successfully!';
        $this->alert = true;

        $this->emit('refreshChildren', $this->alertType, $this->alertMessage);
        $this->coupon = new coupon;
    }

    public function render()
    {
        return view('livewire.admin.coupon.coupon-create');
    }
}

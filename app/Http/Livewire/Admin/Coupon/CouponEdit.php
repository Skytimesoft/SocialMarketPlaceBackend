<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use MichaelRubel\Couponables\Models\Coupon;

class CouponEdit extends Component
{
    public $alert = false;

    public $alertType = '';

    public $alertMessage = '';

    public Coupon $coupon;

    public $status = '';

    public function rules()
    {
        return [
            'coupon.code' => 'required|string|max:64|unique:coupons,code,' . $this->coupon->id,
            'coupon.value' => 'required|numeric',
            'coupon.limit' => 'nullable|numeric|min:1',
            'status' => 'required',
        ];
    }

    protected $messages = [
        'coupon.is_enabled.required' => 'Please choose a status.',
    ];

    public function mount()
    {
        if ($coupon = Coupon::findOrFail(request()->id)) {
            $this->coupon = $coupon;
            $this->status = (string) $coupon->is_enabled;
        } else {
            abort(404);
        }
    }

    public function updateCoupon()
    {
        $this->validate();
        $this->coupon->is_enabled = (int) $this->status;
        $this->coupon->save();

        $this->alert = false;
        $this->alertType = 'success';
        $this->alertMessage = 'Coupon updated successfully!';
        $this->alert = true;

        $this->emit('refreshChildren', $this->alertType, $this->alertMessage);
    }

    public function render()
    {
        return view('livewire.admin.coupon.coupon-edit');
    }
}

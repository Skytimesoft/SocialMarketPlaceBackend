<?php

namespace App\Http\Livewire;

use MichaelRubel\Couponables\Models\Coupon;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class CouponTable extends DataTableComponent
{
    protected $model = Coupon::class;

    protected $listeners = ['refreshChildren' => '$refresh'];

    public function openCouponDeleteModal(Coupon $coupon)
    {
        $this->emitUp('openCouponDeleteModal', $coupon);
    }

    public function configure(): void
    {
        $this->setPageName('coupons');
        $this->setPrimaryKey('id');
        $this->setEagerLoadAllRelationsEnabled();
        $this->setColumnSelectStatus(false);
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setPerPage(10);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->hideIf(true),
            Column::make("Code", "code")->searchable(),
            Column::make("Discount Amount", "value"),
            Column::make("Limit", "limit")
                ->format(
                    function ($value, $row, Column $column) {
                        if (is_null($value)) {
                            return '<span class="">N/A</span>';
                        }

                        return $value;
                    }
                )
                ->html(),
            Column::make("Status", "is_enabled")
                ->searchable()
                ->format(
                    function ($value, $row, Column $column) {
                        $html = '<span class="badge bg-green-lt">Enabled</span>';

                        if ($value == 0) {
                            $html = '<span class="badge bg-red-lt">Disabled</span>';
                        }

                        return $html;
                    }
                )
                ->html(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $edit = '<a href="' . route('admin.coupon.edit', ['id' => $row->id]) . '" class="btn btn-primary  btn-icon me-1" aria-label="Edit User"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/> <path d="M16 5l3 3"/> </svg> </a>';

                        $delete = '<a wire:click="openCouponDeleteModal(' . $row->id . ')" class="btn btn-danger w-20 btn-icon" aria-label="Delete User"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M4 7l16 0"/> <path d="M10 11l0 6"/> <path d="M14 11l0 6"/> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/></svg> </a>';


                        return $edit . $delete;
                    }
                )->html(),
        ];
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class OrderTable extends DataTableComponent
{
    protected $model = Order::class;

    protected $listeners = ['refreshChildren' => '$refresh'];

    public $userNameMap = [];

    public function mount()
    {
        $this->userNameMap = User::all()->pluck('name', 'id')->toArray();
    }

    public function configure(): void
    {
        $this->setPageName('orders');
        $this->setPrimaryKey('id');
        $this->setEagerLoadAllRelationsEnabled();
        $this->setColumnSelectStatus(false);
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setPerPage(10);
    }

    public function columns(): array
    {
        $userNameMap = $this->userNameMap;

        return [
            Column::make("Id", "id")
                ->hideIf(true),
            Column::make("Unique id", "unique_id")
                ->searchable(),
            Column::make("Product id", "product_id")
                ->sortable()
                ->searchable(),
            Column::make("Status", "status")
                ->sortable()
                ->searchable(),
            Column::make("Quantity", "quantity")
                ->sortable(),
            Column::make("Total amount", "total_amount")
                ->sortable(),
            Column::make("Created By", "user_id")
                ->format(
                    function ($value, $row, Column $column) use ($userNameMap) {
                        if (array_key_exists($value, $userNameMap)) {
                            return '<a href="' . route('admin.user.view', ['id' => $value]) . '">' . $userNameMap[$value] . '</a>';
                        }
                    }
                )
                ->html()
                ->searchable(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $edit = '<a href="' . route('admin.order.view', ['id' => $row->id]) . '" class="btn btn-primary  btn-icon me-1" aria-label="Edit User"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/> <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/></svg> </a>';

                        return $edit;
                    }
                )->html(),
        ];
    }
}

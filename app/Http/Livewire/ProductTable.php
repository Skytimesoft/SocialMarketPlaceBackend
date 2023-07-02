<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    protected $listeners = ['refreshChildren' => '$refresh'];

    public $userNameMap = [];

    public $categoryMap = [];

    public $subcategoryMap = [];

    public function mount()
    {
        $this->userNameMap = User::all()->pluck('name', 'id')->toArray();
        $this->categoryMap = Category::all()->pluck('name', 'id')->toArray();
        $this->subcategoryMap = SubCategory::all()->pluck('name', 'id')->toArray();
    }

    public function openProductDeleteModal(Product $product)
    {
        $this->emitUp('openProductDeleteModal', $product);
    }

    public function configure(): void
    {
        $this->setPageName('products');
        $this->setPrimaryKey('id');
        $this->setEagerLoadAllRelationsEnabled();
        $this->setColumnSelectStatus(false);
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setPerPage(10);
    }

    public function columns(): array
    {
        $userNameMap = $this->userNameMap;
        $categoryMap = $this->categoryMap;
        $subcategoryMap = $this->subcategoryMap;

        return [
            Column::make("ID", 'id')
                ->hideIf(true),
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make("Stock Available", "stock"),
            Column::make("Currency", "price_currency")
                ->hideIf(true),
            Column::make("Price (per pc)", "price")
                ->format(
                    function ($value, $row, Column $column) {
                        return get_currency_symbol($row->price_currency) . $row->price;
                    }
                )
                ->html(),
            Column::make("Category", "category_id")
                ->format(
                    function ($value, $row, Column $column) use ($categoryMap) {
                        if (array_key_exists($value, $categoryMap)) {
                            return $categoryMap[$value];
                        }
                    }
                )
                ->html(),
            Column::make("Sub Category", "sub_category_id")
                ->format(
                    function ($value, $row, Column $column) use ($subcategoryMap) {
                        if (isset($value) && array_key_exists($value, $subcategoryMap)) {
                            return $subcategoryMap[$value];
                        }

                        return '<p class="small">N/A</p>';
                    }
                )
                ->html(),
            Column::make("Owner", "owner_id")
                ->format(
                    function ($value, $row, Column $column) use ($userNameMap) {
                        if (array_key_exists($value, $userNameMap)) {
                            return '<a href="' . route('admin.seller.view', ['id' => $value]) . '">' . $userNameMap[$value] . '</a>';
                        }
                    }
                )
                ->html(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $edit = '<a href="' . route('admin.user.view', ['id' => $row->id]) . '" class="btn btn-primary  btn-icon me-1" aria-label="Edit User"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/> <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/></svg> </a>';

                        $delete = '<a wire:click="openUserDeleteModal(' . $row->id . ')" class="btn btn-danger w-20 btn-icon" aria-label="Delete User"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M4 7l16 0"/> <path d="M10 11l0 6"/> <path d="M14 11l0 6"/> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/></svg> </a>';

                        return $edit . $delete;
                    }
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Product::query()
            ->orderBy('created_at', 'desc')
            ->when($this->columnSearch['name'] ?? null, fn($query, $name) => $query->where('users.name', 'like', '%' . $name . '%'))
            ->when($this->columnSearch['email'] ?? null, fn($query, $email) => $query->where('users.email', 'like', '%' . $email . '%'));
    }
}

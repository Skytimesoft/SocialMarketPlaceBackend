<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
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
                ->searchable()
                ->format(
                    function ($value, $row, Column $column) {
                        return Str::limit($value, 40);
                    }
                ),
            Column::make("Stock", "stock"),
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
                ->html()
                ->searchable(),
            Column::make("Sub Category", "sub_category_id")
                ->format(
                    function ($value, $row, Column $column) use ($subcategoryMap) {
                        if (isset($value) && array_key_exists($value, $subcategoryMap)) {
                            return $subcategoryMap[$value];
                        }

                        return '<p class="small">N/A</p>';
                    }
                )
                ->html()
                ->searchable(),
            Column::make("Owner", "owner_id")
                ->format(
                    function ($value, $row, Column $column) use ($userNameMap) {
                        if (array_key_exists($value, $userNameMap)) {
                            return '<a href="' . route('admin.seller.view', ['id' => $value]) . '">' . $userNameMap[$value] . '</a>';
                        }
                    }
                )
                ->html()
                ->searchable(),
            Column::make('Actions')
                ->label(
                    function ($row, Column $column) {
                        $edit = '<a href="' . route('admin.product.edit', ['id' => $row->id]) . '" class="btn btn-primary  btn-icon me-1" aria-label="Edit User"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/> <path d="M16 5l3 3"/> </svg> </a>';

                        $delete = '<a wire:click="openProductDeleteModal(' . $row->id . ')" class="btn btn-danger w-20 btn-icon" aria-label="Delete User"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M4 7l16 0"/> <path d="M10 11l0 6"/> <path d="M14 11l0 6"/> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/></svg> </a>';

                        return $edit . $delete;
                    }
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Product::query()
            ->orderBy('created_at', 'desc');
    }
}

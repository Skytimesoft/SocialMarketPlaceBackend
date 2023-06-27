<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryList extends Component
{
    public $categories = [];

    public $category_id;

    public $name;

    public $alert = false;

    public $alertType = '';

    public $alertMessage = '';

    protected $messages = [
        'name.required' => 'Name cannot be empty.',
        'name.max' => 'Name too long!',
        'category_id.required' => 'Please select a category.',
    ];

    public function rules()
    {
        return [
            "name" => "required|max:190",
            "category_id" => "required|numeric",
        ];
    }

    protected $listeners = [
        'openSubCategoryDeleteModal' => 'openSubCategoryDeleteModal',
        'openSubCategoryEditModal' => 'openSubCategoryEditModal',
        'refreshComponent' => 'refreshChildren'
    ];

    public function mount()
    {
        $this->categories = Category::all()->pluck('name', 'id')->toArray();
    }

    public function createSubCategory()
    {
        $data = $this->validate();
        $model = SubCategory::create($data);

        $this->alert = false;

        if ($model instanceof SubCategory) {
            $this->alertType = 'success';
            $this->alertMessage = 'Sub category created successfully!';
            $this->name = '';
            $this->category_id = '';
        } else {
            $this->alertType = 'danger';
            $this->alertMessage = 'Something went wrong!';
        }

        $this->alert = true;
        $this->emit('refreshChildren', $this->alertType, $this->alertMessage);
    }

    public function refreshChildren()
    {
        $this->emit('refreshChildren');
    }

    public function openSubCategoryDeleteModal(SubCategory $subcategory)
    {
        $this->emit('subCategoryDeleteModal', $subcategory);
    }

    public function openSubCategoryEditModal(SubCategory $subcategory)
    {
        $this->emit('subCategoryEditModal', $subcategory, $this->categories);
    }

    public function render()
    {
        return view('livewire.admin.product.sub-category-list');
    }
}
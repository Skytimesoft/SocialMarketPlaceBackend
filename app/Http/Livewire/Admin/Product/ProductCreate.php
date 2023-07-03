<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class ProductCreate extends Component
{
    public $alert = false;

    public $alertType = '';

    public $alertMessage = '';

    public $categories = [];

    public $subcategories = [];

    public $isCategorySelected = false;

    public Product $product;

    protected $listeners = ['descriptionData' => 'updateDescriptionData'];

    public function rules()
    {
        return [
            'product.title' => 'required|string|max:191',
            'product.description' => 'required|string|max:65000',
            'product.category_id' => 'required|numeric',
            'product.sub_category_id' => 'nullable|numeric',
            'product.price' => 'required|numeric',
        ];
    }

    protected $messages = [
        'product.title.required' => 'Please type product title.',
        'product.description.required' => 'Please type and save the description.',
        'product.category_id.required' => 'Please select a category.',
        'product.price.required' => 'Please type price for the product.',
        'product.price.numeric' => 'Price must be numeric!',
    ];

    public function mount()
    {
        $this->product = new Product;
        $this->categories = Category::all()->pluck('name', 'id')->toArray();
        $this->subcategories = SubCategory::whereCategoryId(Category::first()->id)->pluck('name', 'id')->toArray();
    }

    public function updateDescriptionData($data)
    {
        $this->product->description = $data;
    }

    public function updatedProductCategoryId()
    {
        $this->isCategorySelected = false;

        $this->product->sub_category_id = null;
        $this->subcategories = SubCategory::whereCategoryId($this->product->category_id)->pluck('name', 'id')->toArray();

        $this->isCategorySelected = true;
    }

    public function createNewProduct()
    {
        $this->validate();
        $this->product->owner_id = auth()->user()->id;
        $this->product->save();

        $this->alert = false;
        $this->alertType = 'success';
        $this->alertMessage = 'Product information added successfully!';
        $this->alert = true;

        $this->emit('refreshChildren', $this->alertType, $this->alertMessage);
        $this->product = new Product;
        $this->subcategories = [];
    }

    public function render()
    {
        return view('livewire.admin.product.product-create');
    }
}

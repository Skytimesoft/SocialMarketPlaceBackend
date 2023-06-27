<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\SubCategory;

class SubCategoryEditModal extends Component
{
    public SubCategory $subcategory;

    public $categories = [];

    protected $listeners = ['subCategoryEditModal' => 'subCategoryEditModal'];

    protected function rules()
    {
        return [
            "subcategory.name" => "required|max:190",
            "subcategory.category_id" => "required|numeric",
        ];
    }

    public function subCategoryEditModal(SubCategory $subcategory, $categories)
    {
        $this->subcategory = $subcategory;
        $this->categories = $categories;
        $this->dispatchBrowserEvent('openEditModal');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->subcategory->update($validatedData);
        $this->emitUp('refreshComponent');
    }

    public function render()
    {
        return view('livewire.admin.product.sub-category-edit-modal');
    }
}
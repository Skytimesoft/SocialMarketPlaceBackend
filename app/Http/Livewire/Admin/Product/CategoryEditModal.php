<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;

class CategoryEditModal extends Component
{
    public Category $category;

    protected $listeners = ['categoryEditModal' => 'categoryEditModal'];

    protected function rules()
    {
        return [
            "category.name" => "required|max:190"
        ];
    }

    public function categoryEditModal(Category $category)
    {
        $this->category = $category;
        $this->dispatchBrowserEvent('openEditModal');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->category->update($validatedData);
        $this->emitUp('refreshComponent');
    }

    public function render()
    {
        return view('livewire.admin.product.category-edit-modal');
    }
}

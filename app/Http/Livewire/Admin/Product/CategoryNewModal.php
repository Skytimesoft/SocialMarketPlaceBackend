<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;

class CategoryNewModal extends Component
{
    public Category $category;

    protected $listeners = ['categoryNewModal' => 'categoryNewModal'];

    protected function rules()
    {
        return [
            "category.name" => "required|max:190|unique:categories,name"
        ];
    }

    public function mount()
    {
        $this->category = new Category;
    }

    public function categoryNewModal()
    {
        $this->dispatchBrowserEvent('openNewModal');
    }

    public function create()
    {
        $validatedData = $this->validate();

        $this->category->update($validatedData);
        $this->category->save();
        $this->category = new Category;

        $this->emitUp('refreshComponent');
    }

    public function render()
    {
        return view('livewire.admin.product.category-new-modal');
    }
}

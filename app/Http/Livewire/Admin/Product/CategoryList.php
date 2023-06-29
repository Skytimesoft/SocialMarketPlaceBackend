<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    protected $listeners = [
        'openCategoryDeleteModal' => 'openCategoryDeleteModal',
        'openCategoryEditModal' => 'openCategoryEditModal',
        'refreshComponent' => 'refreshChildren'
    ];

    public function refreshChildren()
    {
        $this->emit('refreshChildren');
    }

    public function openNewCategoryModal()
    {
        $this->emit('categoryNewModal');
    }

    public function openCategoryDeleteModal(Category $category)
    {
        $this->emit('categoryDeleteModal', $category);
    }

    public function openCategoryEditModal(Category $category)
    {
        $this->emit('categoryEditModal', $category);
    }

    public function render()
    {
        return view('livewire.admin.product.category-list');
    }
}

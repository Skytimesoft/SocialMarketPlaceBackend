<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;

class CategoryDeleteModal extends Component
{
    public Category $category;

    public $confirmDelete = false;

    protected $listeners = ['categoryDeleteModal' => 'categoryDeleteModal'];

    public function categoryDeleteModal(Category $category)
    {
        $this->category = $category;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function updatedConfirmDelete()
    {
        if ($this->confirmDelete) {
            $this->category->clearFootprints();
            $this->category->delete();

            $this->emitUp('refreshComponent');
        }
    }

    public function render()
    {
        return view('livewire.admin.product.category-delete-modal');
    }
}

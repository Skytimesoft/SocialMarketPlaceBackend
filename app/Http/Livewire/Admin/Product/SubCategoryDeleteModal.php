<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\SubCategory;

class SubCategoryDeleteModal extends Component
{
    public SubCategory $category;

    public $confirmDelete = false;

    protected $listeners = ['subCategoryDeleteModal' => 'subCategoryDeleteModal'];

    public function subCategoryDeleteModal(SubCategory $category)
    {
        $this->category = $category;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function updatedConfirmDelete()
    {
        if ($this->confirmDelete) {
            $this->category->delete();
            $this->emitUp('refreshComponent');
        }
    }

    public function render()
    {
        return view('livewire.admin.product.sub-category-delete-modal');
    }
}
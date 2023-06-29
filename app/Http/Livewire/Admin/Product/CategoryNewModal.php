<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CategoryNewModal extends Component
{
    use WithFileUploads;

    public $class = "";

    public $style = "display: none;";

    public Category $category;

    public $logo = null;

    protected $listeners = ['categoryNewModal' => 'showModal'];

    protected function rules()
    {
        return [
            "category.name" => "required|string|max:190|unique:categories,name",
            "logo" => "required|image|max:256",
        ];
    }

    protected $messages = [
        'logo.image' => 'File type must be image.',
        'logo.max:256' => 'File size too large.',
    ];

    public function mount()
    {
        $this->category = new Category;
    }

    public function showModal()
    {
        $this->class = "show";
        $this->style = "display: block;";
    }

    public function closeModal()
    {
        $this->class = "";
        $this->style = "display: none;";
        $this->logo = null;
        $this->category = new Category;
        $this->emitUp('refreshComponent');
    }

    public function create()
    {
        $this->validate();

        if ($this->logo) {
            $fileName = $this->logo->store('/platforms', 'public');
            $this->category->logo = $fileName;
        }

        $this->category->save();
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.product.category-new-modal');
    }
}

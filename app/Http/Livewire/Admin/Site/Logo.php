<?php

namespace App\Http\Livewire\Admin\Site;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Logo extends Component
{
    use WithFileUploads;

    public $logo = null;

    public $logoFound = false;

    public $logoUrl = 'public/storage/logo.png';

    protected function rules()
    {
        return [
            "logo" => "required|image|mimes:png|max:1024",
        ];
    }

    protected $messages = [
        'logo.image' => 'File type must be image.',
        'logo.max:1024' => 'File size too large.',
    ];

    public function mount()
    {
        if (Storage::disk('public')->exists('logo.png')) {
            $this->logoFound = true;
        }
    }

    public function update()
    {
        $this->validate();
        $this->logo->storeAs('/', 'logo.png', 'public');

    }

    public function render()
    {
        return view('livewire.admin.site.logo');
    }
}
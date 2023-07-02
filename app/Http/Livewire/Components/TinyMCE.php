<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TinyMCE extends Component
{
    public $inputName = '';

    public $data;

    public $emitEventName = null;

    public function mount($inputName)
    {
        $this->inputName = $inputName;
        $this->emitEventName = $inputName . 'Data';
    }

    public function updatedData()
    {
        $this->syncData();
    }

    public function syncData()
    {
        $this->emitUp($this->emitEventName, $this->data);
    }

    public function render()
    {
        return view('livewire.components.tiny-m-c-e');
    }
}

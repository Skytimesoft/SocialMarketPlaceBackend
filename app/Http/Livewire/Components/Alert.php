<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Alert extends Component
{
    public $closed = false;

    public $type = '';

    public $message = '';

    protected $listeners = ['refreshChildren' => 'refresh'];

    public function mount($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function refresh($type, $message)
    {
        $this->closed = false;
        $this->type = $type;
        $this->message = $message;
    }

    public function updatedClosed()
    {
        if ($this->closed === true) {
            $this->type = '';
            $this->message = '';
        }
    }

    public function render()
    {
        return view('livewire.components.alert');
    }
}

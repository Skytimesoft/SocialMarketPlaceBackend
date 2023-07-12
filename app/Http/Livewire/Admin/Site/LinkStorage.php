<?php

namespace App\Http\Livewire\Admin\Site;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class LinkStorage extends Component
{
    public $alert = false;

    public $alertType = '';

    public $alertMessage = '';

    public function linkStorage()
    {
        Artisan::call('storage:link');

        $this->alert = false;
        $this->alertType = 'success';
        $this->alertMessage = 'Application storage linked successfully!';
        $this->alert = true;

        $this->emit('refreshChildren', $this->alertType, $this->alertMessage);
    }

    public function render()
    {
        return view('livewire.admin.site.link-storage');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public $showUserDeleteModal = false;

    protected $listeners = [
        'openUserDeleteModal' => 'openUserDeleteModal',
        'refreshComponent' => 'refreshChildren'
    ];

    public function refreshChildren()
    {
        $this->emit('refreshChildren');
    }

    public function openUserDeleteModal(User $user)
    {
        $this->emit('userDeleteModal', $user);
    }

    public function render()
    {
        return view('livewire.admin.user-list');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserDeleteModal extends Component
{
    public User $user;

    public $confirmDelete = false;

    protected $listeners = ['userDeleteModal' => 'userDeleteModal'];

    public function userDeleteModal(User $user)
    {
        $this->user = $user;
        $this->dispatchBrowserEvent('openModal');
    }

    public function updatedConfirmDelete()
    {
        if ($this->confirmDelete) {
            $this->user->delete();
            $this->emitUp('refreshComponent');
        }
    }

    public function render()
    {
        return view('livewire.admin.user-delete-modal');
    }
}

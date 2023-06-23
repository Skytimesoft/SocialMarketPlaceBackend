<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public User $user;

    public $name = '';

    public $email = '';

    public $password = '';

    public $password_confirmation = '';

    public $alert = false;

    public $alertType = '';

    public $alertMessage = '';

    protected $listeners = ['refreshComponent' => '$refresh'];

    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'password.min:6' => 'The password should be minimum of 6 characters.',
        'password.same' => 'The passwords should match.',
    ];

    protected $validationAttributes = [
        'email' => 'email address'
    ];

    public function mount()
    {
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);

        $this->user->update($validatedData);

        $this->alert = false;
        $this->alertType = 'success';
        $this->alertMessage = 'Basic information updated successfully!';
        $this->alert = true;

        $this->emit('refreshChildren', $this->alertType, $this->alertMessage);

    }

    public function submitNewPassword()
    {
        $validatedData = $this->validate([
            'password_confirmation' => 'required|min:6',
            'password' => 'required|min:6|same:password_confirmation',
        ]);

        $this->user->update([
            'password' => Hash::make($validatedData['password']),
        ]);

        $this->password = '';
        $this->password_confirmation = '';

        $this->alert = false;
        $this->alertType = 'success';
        $this->alertMessage = 'Password updated successfully!';
        $this->alert = true;

        $this->emit('refreshChildren', $this->alertType, $this->alertMessage);
    }

    public function render()
    {
        $adminUser = auth()->user();

        return view('livewire.admin.profile', compact('adminUser'));
    }
}

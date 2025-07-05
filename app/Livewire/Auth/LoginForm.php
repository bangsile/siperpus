<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class LoginForm extends Component
{
    public $username;
    public $password;

    public function login()
    {
		$this->validate([
			'username' => 'required|string',
			'password' => 'required|string',
		], [
			'username.required' => 'Username wajib diisi.',
			'password.required' => 'Password wajib diisi.',
		]);

    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}

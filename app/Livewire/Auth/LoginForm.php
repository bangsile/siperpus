<?php

namespace App\Livewire\Auth;

use App\Models\User;
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

        $user = User::where('username', $this->username)->first();
        if (!$user || !password_verify($this->password, $user->password)) {
            session()->flash('errorLogin', 'Login gagal. Silahkan coba lagi.');
            return;
        }
        auth()->login($user);
        return redirect()->intended('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}

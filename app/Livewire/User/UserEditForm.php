<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEditForm extends Component
{
    public $name;
    public $username;
    public $email;
    public $role;

    public $user;

    public function mount($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $this->user = $user;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->role = $user->getRoleNames()->first();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $this->user->id,
            'email' => 'required|string|email|unique:users,email,' . $this->user->id,
            'role' => 'required|string',
        ], [
            'name.required' => 'Nama wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Format email salah',
            'role.required' => 'Role wajib dipilih',
        ]);

        try {
            $this->user->update([
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
            ]);
            $this->user->assignRole($this->role);
            session()->flash('success', 'Berhasil menyimpan perubahan');
            return $this->redirect(route('users.index'), true);
        } catch (\Throwable $th) {
            session()->flash('error', 'Gagal menyimpan perubahan');
            return $this->redirect(route('users.index'), true);
        }

    }

    public function resetPassword()
    {
        try {
            $this->user->update([
                'password' => Hash::make($this->user->username)
            ]);
            session()->flash('success', 'Berhasil reset password');
            return $this->redirect(route('users.edit', $this->user->username), true);
        } catch (\Throwable $th) {
            session()->flash('error', 'Gagal reset password');
            return $this->redirect(route('users.edit', $this->user->username), true);
        }
    }

    public function render()
    {
        return view('livewire.user.user-edit-form');
    }
}

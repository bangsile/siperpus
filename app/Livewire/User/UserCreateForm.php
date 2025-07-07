<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreateForm extends Component
{
    public $name;
    public $username;
    public $email;
    public $role;

    public $showToast = false;
    public $toastType = 'success';
    public $toastMessage = '';

    public function save()
    {
        $this->reset(['showToast', 'toastType', 'toastMessage']);
        $this->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|unique:users,email|email',
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
            $user = User::create([
                "name" => $this->name,
                "username" => $this->username,
                "email" => $this->email,
                "password" => Hash::make($this->username)
            ]);
            if ($user) {
                $user->assignRole($this->role);
            } else {
                session()->flash('errorCreate', 'Gagal menambahkan pengguna');
                return $this->redirect(route('users.create'), true);
            }
            session()->flash('successCreate', 'Berhasil menambahkan pengguna');
            return $this->redirect(route('users.index'), true);
        } catch (\Throwable $th) {
            session()->flash('errorCreate', 'Gagal menambahkan pengguna');
            return $this->redirect(route('users.create'), true);
        }

    }

    public function emptyForm()
    {

    }

    public function render()
    {
        return view('livewire.user.user-create-form');
    }
}

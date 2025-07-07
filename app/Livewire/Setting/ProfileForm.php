<?php

namespace App\Livewire\Setting;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileForm extends Component
{
    public $name;
    public $email;
    public $username;
    public $role;

    public function boot()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->role = Auth::user()->getRoleNames()->first();
    }

    public function save()
    {
         $this->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username,' . Auth::user()->id,
            'email' => 'required|string|email|unique:users,email,' . Auth::user()->id,
        ], [
            'name.required' => 'Nama wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Format email salah',
        ]);

        try {
            $user = User::find(Auth::user()->id);
            if ($user) {
                $user->update([
                "name" => $this->name,
                "username" => $this->username,
                "email" => $this->email,
            ]);
            } else {
                session()->flash('errorUpdate', 'Gagal menyimpan profil');
                return $this->redirect(route('setting.profile'), true);
            }
            session()->flash('successUpdate', 'Berhasil menyimpan profil');
            return $this->redirect(route('setting.profile'), true);
        } catch (\Throwable $th) {
            session()->flash('errorUpdate', 'Gagal menyimpan profil');
            return $this->redirect(route('setting.profile'), true);
        }
    }

    public function render()
    {
        return view('livewire.setting.profile-form');
    }
}

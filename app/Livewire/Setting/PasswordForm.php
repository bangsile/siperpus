<?php

namespace App\Livewire\Setting;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PasswordForm extends Component
{
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public function save()
    {
        $this->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string',
            'confirmPassword' => 'required|string|same:newPassword',
        ], [
            'currentPassword.required' => 'Password sekarang wajib diisi.',
            'newPassword.required' => 'Password baru wajib diisi.',
            'confirmPassword.required' => 'Konfirmasi password wajib diisi.',
            'confirmPassword.same' => 'Konfirmasi password tidak cocok dengan password baru.',
        ]);

        // Cek apakah currentPassword benar
        if (!Hash::check($this->currentPassword, Auth::user()->password)) {
            $this->addError('currentPassword', 'Password saat ini tidak sesuai.');
            return;
        }
        try {
            $user = User::find(Auth::user()->id);
            if ($user) {
                $user->update([
                    "password" => Hash::make($this->newPassword)
                ]);
            } else {
                session()->flash('errorUpdate', 'Gagal mengubah password');
                return $this->redirect(route('setting.password'), true);
            }
            session()->flash('successUpdate', 'Berhasil mengubah password');
            return $this->redirect(route('setting.password'), true);
        } catch (\Throwable $th) {
            session()->flash('errorUpdate', 'Gagal mengubah password');
            return $this->redirect(route('setting.password'), true);
        }
    }

    public function render()
    {
        return view('livewire.setting.password-form');
    }
}

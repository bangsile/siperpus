<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public $selectedUserId = null;
    public $showModal = false;

    public function confirmDelete($id)
    {
        $this->selectedUserId = $id;
        $this->showModal = true;
    }

    public function deleteUser()
    {
        User::findOrFail($this->selectedUserId)->delete();
        $this->showModal = false;
        session()->flash('success', 'Berhasil menghapus pengguna');
        return $this->redirect(route('users.index'), true);
    }


    public function render()
    {
        $users = User::where('id', "!=", Auth::user()->id)
            ->when($this->search, fn($q) => $q->search($this->search))
            ->orderBy('name')
            ->paginate($this->perPage);

        return view('livewire.user.user-list', [
            'users' => $users,
        ]);
    }
}

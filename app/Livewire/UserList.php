<?php

namespace App\Livewire;

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

    public function render()
    {
        $users = User::when($this->search, fn($q) => $q->search($this->search))
            ->orderBy('name')
            ->paginate($this->perPage); 

        return view('livewire.user-list', [
            'users' => $users,
        ]);
    }
}

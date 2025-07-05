<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $profilOpen = false;

    public function profil()
    {
        $this->profilOpen = !$this->profilOpen;
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}

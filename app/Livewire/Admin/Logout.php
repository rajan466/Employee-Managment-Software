<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.admin.logout')->layout('layouts.app', ['title' => 'Logout']);
    }
}

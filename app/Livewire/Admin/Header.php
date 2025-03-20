<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Header extends Component
{

    public $pageTitle;

    public function mount($title = 'Dashboard')
    {
        $this->pageTitle = $title;
    }


    public function render()
    {
        return view('livewire.admin.header')->layout('layouts.app');
    }
}

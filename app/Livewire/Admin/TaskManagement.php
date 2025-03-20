<?php

// app/Livewire/Admin/TaskManagement.php
namespace App\Livewire\Admin;

use Livewire\Component;

class TaskManagement extends Component
{
    public function render()
    {
        return view('livewire.admin.task-management')->layout('layouts.app', ['title' => 'Task Management']);
    }
}

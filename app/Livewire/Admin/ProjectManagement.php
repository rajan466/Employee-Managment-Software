<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use App\Models\Project;
use App\Models\Staff;
use Livewire\Component;

class ProjectManagement extends Component
{

    public $projects, $companies, $staffMembers, $company_id, $staff_id, $project_name;    

    public function mount()
    {
        $this->companies = Company::all();
        $this->staffMembers = Staff::all();
    }

    public function create()
    {
        $this->resetFields();    
    }

    public function store()
    {
        $this->validate([
            'company_id' => 'required',
            'staff_id' => 'required',
            'project_name' => 'required|string|max:255',
        ]);

        Project::create([
            'company_id' => $this->company_id,
            'staff_id' => $this->staff_id,
            'project_name' => $this->project_name,
        ]);

        $this->resetFields();
        session()->flash('message', 'Project Created Successfully!');        
    }

    private function resetFields()
    {
        $this->company_id = '';
        $this->staff_id = '';
        $this->project_name = '';
    }

    public function render()
    {
        $projects = Project::with(['company', 'staff'])->get();

        // used dd for dubbugin
        dd($projects);

        return view('livewire.admin.project-management', [
            'projects' => $projects
        ])->layout('layouts.app', ['title' => 'Project Management']);
    }
}

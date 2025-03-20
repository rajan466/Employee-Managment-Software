<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CompanyManagment extends Component
{
    public $search = '';
    public $company_name, $company_address, $contact1_name, $contact1_number;
    public $companyIdToDelete;

    public function saveCompany()
    {
        $this->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'nullable|string|max:255',
            'contact1_name' => 'nullable|string|max:255',
            'contact1_number' => 'nullable|string|regex:/^[0-9]{10}$/',
        ]);

        Company::create([
            'company_name' => $this->company_name,
            'company_address' => $this->company_address,
            'contact1_name' => $this->contact1_name,
            'contact1_number' => $this->contact1_number,
        ]);

        session()->flash('success', 'Company Added Successfully!');
        $this->reset();
    }

    public function confirmDelete($companyId)
    {
        $this->companyIdToDelete = $companyId;
    }

    public function deleteCompany()
    {
        if ($this->companyIdToDelete) {
            $company = Company::find($this->companyIdToDelete);
            if ($company) {
                $company->delete();
                session()->flash('message', 'Company deleted successfully.');
            } else {
                session()->flash('error', 'Company not found!');
            }
        }
    }
    public function render()
    {
        $companies = Company::where('company_name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.admin.company-managment', ['companies' => $companies])->layout('layouts.app', ['title' => 'Company Management']);
    }
}

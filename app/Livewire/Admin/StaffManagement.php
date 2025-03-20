<?php

namespace App\Livewire\Admin;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class StaffManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $searchTable = '';

    public $staff_id, $first_name, $last_name, $date_of_birth, $gender, $marital_status;
    public $personal_email, $office_email, $mobile_no_1, $mobile_no_2;
    public $home_address_1, $home_address_2, $emergency_name, $relationship;
    public $emergency_phone, $bank_name, $account_number, $ifsc_code;
    public $aadharcard_number, $pancard_number, $aadharcard_file, $pancard_file;
    public $start_time, $end_time, $joining_date;

    public function saveStaff()
    {
        $validatedData = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'marital_status' => 'required|string',
            'personal_email' => 'required|email|unique:staff,personal_email',
            'office_email' => 'nullable|email|unique:staff,office_email',
            'mobile_no_1' => 'required|string|unique:staff,mobile_no_1',
            'mobile_no_2' => 'nullable|string',
            'home_address_1' => 'required|string',
            'home_address_2' => 'nullable|string',
            'emergency_name' => 'required|string',
            'relationship' => 'required|string',
            'emergency_phone' => 'required|string',
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
            'ifsc_code' => 'required|string',
            'aadharcard_number' => 'required|string|unique:staff,aadharcard_number',
            'pancard_number' => 'required|string|unique:staff,pancard_number',
            'aadharcard_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'pancard_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'start_time' => 'nullable|string',
            'end_time' => 'nullable|string',
            'joining_date' => 'required|date',
        ]);

        if ($this->aadharcard_file) {
            $validatedData['aadharcard_file'] = $this->aadharcard_file->store('uploads/staff', 'public');
        }

        if ($this->pancard_file) {
            $validatedData['pancard_file'] = $this->pancard_file->store('uploads/staff', 'public');
        }

        Staff::create($validatedData);

        session()->flash('success', 'Staff Added Successfully!');
        $this->reset();
    }

    public function confirmDelete($id)
    {
        $this->staff_id = $id;
    }

    public function deleteStaff()
    {
        if ($this->staff_id) {
            $staff = Staff::find($this->staff_id);
            if ($staff) {
                $staff->delete();
                session()->flash('message', 'Staff deleted successfully!');
            } else {
                session()->flash('error', 'Staff not found!');
            }
        }
    }

    public function render()
    {
        $staff = Staff::when($this->searchTable, function ($query) {
            return $query->where('first_name', 'like', '%' . $this->searchTable . '%')
                ->orWhere('last_name', 'like', '%' . $this->searchTable . '%')
                ->orWhere('personal_email', 'like', '%' . $this->searchTable . '%')
                ->orWhere('mobile_no_1', 'like', '%' . $this->searchTable . '%');
        })
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.admin.staff-management', compact('staff'))
            ->layout('layouts.app', ['title' => 'Staff Management']);
    }
}

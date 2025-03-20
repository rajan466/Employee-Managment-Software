<style>
    .staff_lable {
        font-size: 13px;
        line-height: 1px;
    }

    .staff_input {
        padding: 5px 10px;
        font-size: 11px
    }

    .border-end {
        border-right: 1.5px solid #ddd !important;
        /* Light gray line */
    }


    td {
        font-size: 12px
    }

    /* Table Head (th) Spacing Adjust */
    #staffTable thead th {
        padding: 5px 45px;
        white-space: nowrap;
    }

    /* Table Cells (td) spacing */
    #staffTable tbody td {
        padding: 8px 45px;
    }
</style>

<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="page-content">
        <div class="container-fluid">
            {{-- Create button --}}
            <div class="flex-shrink-0 d-flex justify-content-between mb-2">
                <h5>Staff</h5>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-success add-btn btn-sm" data-bs-toggle="modal" data-bs-target="#showModal">
                        <i class="ri-add-line align-bottom me-1"></i> Create New Staff
                    </button>
                    <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()">
                        <i class="ri-delete-bin-2-line"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="staffList">
                        <!-- Filter And Search Section -->
                        <div class="card-body m-0 p-2">
                            <form>
                                <div class="row g-3 align-items-center">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="search-box">
                                            <input type="text" wire:model.live="searchTable" wire:keyup="render"
                                                class="form-control search bg-light border-light"
                                                placeholder="Search for staff..."style="padding: 5px 35px; margin: 0; font-size: 12px;">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Table Section -->
                        <div class="card-body">
                            <div class="table-responsive table-card mb-0">
                                <table class="table align-middle table-nowrap mb-0" id="staffTable">
                                    <thead class="table-light text-muted">
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Joining Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @forelse ($staff as $index => $member)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $member->first_name . ' ' . $member->last_name }}</td>
                                                <td>{{ $member->personal_email }}</td>
                                                <td>{{ $member->mobile_no_1 }}</td>
                                                <td>{{ $member->joining_date }}</td>
                                                <td>
                                                    <div class="btn-group gap-2">

                                                        {{-- edit button  --}}
                                                        <i class="ri-pencil-fill edit-icon" data-bs-toggle="modal"
                                                            data-bs-target="#showModal"></i>

                                                        {{-- delete --}}
                                                        <i class="ri-delete-bin-fill delete-icon" wire:click="confirmDelete({{ $member->id }})" data-bs-toggle="modal"
                                                            data-bs-target="#deleteOrder"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            {{-- <tr>
                                                <td colspan="8" class="text-center p-4">No Staff Found</td>
                                            </tr> --}}

                                            <tr class="noresult" style="display: none">
                                                <td class="text-center mt-2">
                                                    No Staff Found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <h5 class="mt-2">No Staff Found</h5>
                                    </div>
                                </div> --}}
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-end mt-2">
                                <div class="pagination-wrap hstack gap-1">
                                    <a class="page-item pagination-prev disabled" href="#">Previous</a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">Next</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Staff Form Modal --}}
            <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-light" style="padding: 14px 20px">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-size: 14px;">Create Staff</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" wire:submit.prevent="saveStaff">
                            <div class="modal-body">
                                <input type="hidden" id="staffId" />
                                <!-- Personal Details -->
                                <h5 class="text-primary mb-2">Personal Details</h5>
                                <div class="row g-2">
                                    {{-- first name --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">First Name <span id="first_name"
                                                style="color: blue">*</span></label>
                                        <input type="text" class="form-control staff_input" name="first_name"
                                            wire:model="first_name" />
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    {{-- last name --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Last Name <span
                                                style="color: blue">*</span></label>
                                        <input type="text" id="lastName-field" class="form-control staff_input"
                                            name="last_name" wire:model="last_name" />
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    {{-- dob --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Date of Birth</label>
                                        <input type="date" id="dob-field" class="form-control staff_input"
                                            name="date_of_birth" wire:model="date_of_birth" />
                                        @error('date_of_birth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- gender --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Gender</label>
                                        <select class="form-control choice staff_input" id="gender-field"
                                            name="gender" wire:model="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- marital status --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Marital Status</label>
                                        <select class="form-control choice" id="maritalStatus-field"
                                            name="marital_status" wire:model="marital_status">
                                            <option value="">Select Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Marrieઇd</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                        @error('marital_status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- personal email --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Personal Email</label>
                                        <input type="email" id="personalEmail-field"
                                            class="form-control staff_input" name="personal_email"
                                            wire:model="personal_email" />
                                        @error('personal_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- office email --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Office Email</label>
                                        <input type="email" id="officeEmail-field" class="form-control staff_input"
                                            name="office_email" wire:model="office_email" />
                                        @error('office_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- mobile no_1 --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Mobile No 1 <span
                                                style="color: blue">*</span></label>
                                        <input type="text" id="mobile1-field" class="form-control staff_input"
                                            name="mobile_no_1" wire:model="mobile_no_1" />
                                        @error('mobile_no_1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- mobile no_2 --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Mobile No 2 <span
                                                style="color: blue">*</span></label>
                                        <input type="text" id="mobile2-field" class="form-control staff_input"
                                            name="mobile_no_2" wire:model="mobile_no_2" />
                                        @error('mobile_no_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- home address1 --}}
                                    <div class="col-lg-3">
                                        <label class="form-label staff_lable">Home Address 1</label>
                                        <input type="text" id="homeAddress1-field"
                                            class="form-control staff_input" name="home_address_1"
                                            wire:model="home_address_1" />
                                        @error('home_address_1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- home adress2 --}}
                                    <div class="col-lg-3">
                                        <label class="form-label staff_lable">Home Address 2</label>
                                        <input type="text" id="homeAddress2-field"
                                            class="form-control staff_input" name="home_address_2"
                                            wire:model="home_address_2" />
                                        @error('home_address_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- joining date --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Joining Date</label>
                                        <input type="date" id="dob-field" class="form-control staff_input"
                                            name="joining_date" wire:model="joining_date" />
                                        @error('joining_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-3">

                                {{-- Emergency Contact And Bank Details  --}}
                                <div class="row g-2">
                                    <!-- Emergency Contact -->
                                    <div class="col-lg-6 border-end pe-3">
                                        <h5 class="text-primary mb-3">Emergency Contact (Optional)</h5>
                                        <div class="row g-2">
                                            {{-- emergency_name --}}
                                            <div class="col-lg-4">
                                                <label class="form-label staff_lable">Emergency Name</label>
                                                <input type="text" id="emergencyName-field"
                                                    class="form-control staff_input" wire:model="emergency_name" />
                                                @error('emergency_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- Relationship --}}
                                            <div class="col-lg-4">
                                                <label class="form-label staff_lable">Relationship</label>
                                                <input type="text" id="emergencyRelation-field"
                                                    class="form-control staff_input" wire:model="relationship" />
                                                @error('relationship')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- Phone --}}
                                            <div class="col-lg-4">
                                                <label class="form-label staff_lable">Phone</label>
                                                <input type="text" id="emergencyPhone-field"
                                                    class="form-control staff_input" wire:model="emergency_phone" />
                                                @error('emergency_phone')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bank Account Details -->
                                    <div class="col-lg-6 ps-3">
                                        <h5 class="text-primary mb-3">Bank Account Details</h5>
                                        <div class="row g-2">
                                            {{-- bank_name --}}
                                            <div class="col-lg-4">
                                                <label class="form-label staff_lable">Bank Name</label>
                                                <input type="text" id="bankName-field"
                                                    class="form-control staff_input" wire:model="bank_name" />
                                                @error('bank_name')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label staff_lable">Account Number</label>
                                                <input type="text" id="accountNumber-field"
                                                    class="form-control staff_input" wire:model="account_number" />
                                                @error('account_number')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label staff_lable">IFSC Code</label>
                                                <input type="text" id="ifsc-field"
                                                    class="form-control staff_input" wire:model="ifsc_code" />
                                                @error('ifsc_code')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <hr class="my-3">

                                {{-- Doduments Details --}}
                                <h5 class="text-primary mb-3">Documents (Optional)</h5>
                                <div class="row g-2">
                                    {{-- Aadharcard Number --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Aadharcard Number</label>
                                        <input type="number" id="aadharCardNumber-field"
                                            class="form-control staff_input" name="aadharcard_number"
                                            wire:model="aadharcard_number" />
                                        @error('aadharcard_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- Pan Card Number --}}
                                    <div class="col-lg-2">
                                        <label class="form-label staff_lable">Pancard Number</label>
                                        <input type="text" id="panCardNumber-field"
                                            class="form-control staff_input" name="pancard_number"
                                            wire:model="pancard_number" />
                                        @error('pancard_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- Aadharcard --}}
                                    <div class="col-lg-4">
                                        <label class="form-label staff_lable">Aadharcard</label>
                                        <input type="file" id="AadharCard-field" class="form-control staff_input"
                                            name="aadharcard_file" wire:model="aadharcard_file" />
                                        @error('aadharcard_file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- PanCard --}}
                                    <div class="col-lg-4">
                                        <label class="form-label staff_lable">Pancard</label>
                                        <input type="file" id="panCard-field" class="form-control staff_input"
                                            name="pancard_file" wire:model="pancard_file" />
                                        @error('pancard_file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <hr class="my-3">
                                <!-- Usual Days of Employment -->
                                <h5 class="text-primary mb-3">Usual Days of Employment</h5>
                                <div class="row g-2">
                                    {{-- monday --}}
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="monday" class="form-check-input">
                                        <label for="monday" class="form-check-label staff_lable">Monday</label>
                                    </div>
                                    {{-- tuesday --}}
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="tuesday" class="form-check-input">
                                        <label for="tuesday" class="form-check-label staff_lable">Tuesday</label>
                                    </div>
                                    {{-- wednesday --}}
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="wednesday" class="form-check-input">
                                        <label for="wednesday" class="form-check-label staff_lable">Wednesday</label>
                                    </div>
                                    {{-- thursday --}}
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="thursday" class="form-check-input">
                                        <label for="thursday" class="form-check-label staff_lable">Thursday</label>
                                    </div>
                                    {{-- friday --}}
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="friday" class="form-check-input">
                                        <label for="friday" class="form-check-label staff_lable">Friday</label>
                                    </div>
                                    {{-- saturday --}}
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="saturday" class="form-check-input">
                                        <label for="saturday" class="form-check-label staff_lable">Saturday</label>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <!-- Working Hours -->
                                <h5 class="text-primary mb-2">Working Hours</h5>
                                <div class="row g-2 align-items-center">
                                    {{-- start time --}}
                                    <div class="col-lg-2">
                                        <label class="form-label mb-2 staff_lable">Start Time</label>
                                        <input type="text" id="workingHours-field"
                                            class="form-control staff_input" placeholder="start time"
                                            wire:model="start_time" />
                                    </div>

                                    {{-- end time --}}
                                    <div class="col-lg-2">
                                        <label class="form-label mb-2 staff_lable">End Time</label>
                                        <input type="text" id="workingHours-field"
                                            class="form-control staff_input" placeholder="end time"
                                            wire:model="end_time" />
                                    </div>
                                </div>
                            </div>

                            {{-- save staff --}}
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light btn-sm" id="close-modal"
                                        data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-success btn-sm">Add
                                        Staff</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            {{-- delete confimation msg --}}
            <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-5 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                            <div class="mt-4 text-center">
                                <h4>You are about to delete a task ?</h4>
                                <p class="text-muted fs-14 mb-4">Deleting your task will remove all of
                                    your information from our database.</p>
                                <div class="hstack gap-2 justify-content-center remove">
                                    <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none"
                                        id="deleteRecord-close" data-bs-dismiss="modal"><i
                                            class="ri-close-line me-1 align-middle btn-sm"></i> Close</button>
                                    <button class="btn btn-danger btn-sm" id="delete-record"  wire:click="confirmDelete({{ $member->id }})">Yes, Delete It</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end delete modal -->
        </div>
    </div>
</div>

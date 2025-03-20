    <style>        
        td {
            font-size: 12px
        }

        /* Table Head (th) Spacing Adjust */
        #companyTable thead th {
            padding: 5px 50px;
            white-space: nowrap;
        }

        /* td spacing  */
        #companyTable tbody td {
            padding: 8px 50px;
        }
    </style>



    <div>
        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif
        <!-- End Success Message -->


        <div class="page-content">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-2 mt-0">
                    <h5>Company Management</h5>
                    <button class="btn btn-success add-btn btn-sm" data-bs-toggle="modal" data-bs-target="#showModal">
                        <i class="ri-add-line align-bottom me-1"></i> Create Company
                    </button>
                </div>
                {{--  --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="companyList">
                            <div class="card-header border-0 m-0 p-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Left: Search Box -->
                                    <div class="search-box" style="max-width: 300px;">
                                        <input type="text" class="form-control search bg-light border-light"
                                            placeholder="Search for company..." wire:model="search"
                                            style="padding: 5px 35px; margin: 0; font-size: 12px;">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive table-card mb-0">
                                    <table class="table align-middle table-nowrap mb-0" id="companyTable">
                                        <thead class="table-light text-muted border">
                                            <tr>
                                                <th data-sort="company_name">Company Name</th>
                                                <th data-sort="company_address">Company Address</th>
                                                <th data-sort="contacts">Name</th>
                                                <th data-sort="contacts">Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @forelse ($companies as $company)
                                                <tr>
                                                    <td class="company_name">{{ $company->company_name }}</td>
                                                    <td class="company_address">{{ $company->company_address }}</td>
                                                    <td class="contacts">{{ $company->contact1_name }}</td>
                                                    <td>{{ $company->contact1_number }}</td>
                                                    <td>
                                                        <div class="btn-group gap-2">
                                                            {{-- edit button  --}}
                                                            <i class="ri-pencil-fill edit-icon" data-bs-toggle="modal"
                                                                data-bs-target="#showModal"></i>

                                                            {{-- delete --}}
                                                            <i class="ri-delete-bin-fill delete-icon"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteRecordModal"
                                                                wire:click="confirmDelete({{ $company->id }})">
                                                            </i>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No companies found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{-- search result error --}}
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a"
                                                style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched more than 200k+ tasks We did
                                                not find any
                                                tasks for you search.</p>
                                        </div>
                                    </div>

                                    <div style="margin-right: 20px">
                                        <div class="d-flex justify-content-end mt-2">
                                            <div class="pagination-wrap hstack gap-1">
                                                <a class="page-item pagination-prev disabled" href="#">
                                                    Previous
                                                </a>
                                                <ul class="pagination listjs-pagination mb-0"></ul>
                                                <a class="page-item pagination-next" href="#">
                                                    Next
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- edit model form --}}
                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light" style="padding: 14px 20px">
                                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 14px;">Create Company
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form class="tablelist-form" wire:submit.prevent="saveCompany">
                                <div class="modal-body">
                                    <div class="mb-3" id="modal-id" style="display: none;">
                                        <label for="id-field" class="form-label">ID</label>
                                        <input type="text" id="id-field" class="form-control" placeholder="ID"
                                            readonly />
                                    </div>

                                    {{-- company name --}}
                                    <div class="mb-1">
                                        <label for="customername-field" class="form-label"
                                            style="font-size: 13px">Company
                                            Name</label>
                                        <input type="text" id="customername-field" class="form-control"
                                            wire:model="company_name" placeholder="Enter Company Name" required
                                            style="padding: 5px 10px;" />
                                        @error('company_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- assign staff --}}
                                    <div class="mb-1">
                                        <label for="assigned-staff" class="form-label"
                                            style="font-size: 13px">Assigned
                                            Staff(Optional)</label>
                                        <select id="assigned-staff" class="form-control choice" required>
                                            <option value="">Select Staff</option>
                                            <option value="1">John Doe</option>
                                            <option value="2">Jane Smith</option>
                                            <option value="3">Robert Brown</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a staff member.</div>
                                    </div>

                                    <!-- Company Address Field -->
                                    <div class="mb-1">
                                        <label for="company-address" class="form-label"
                                            style="font-size: 13px">Company
                                            Address</label>
                                        <textarea id="company-address" class="form-control" placeholder="Enter Company Address"
                                            wire:model="company_address"></textarea>
                                        @error('company_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Contacts Section -->
                                    <div class="mb-1">
                                        <label class="form-label" style="font-size: 13px">Contacts</label>
                                        <div class="row">
                                            <!-- Contact Person 1 -->
                                            <div class="col-md-6">
                                                <input type="text" id="contact1-name" class="form-control mb-2"
                                                    placeholder="Enter Person 1 Name" wire:model="contact1_name"
                                                    style="padding: 5px 10px" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="contact1-number" class="form-control mb-2"
                                                    placeholder="Enter Person 1 Number" wire:model="contact1_number"
                                                    style="padding: 5px 10px" />
                                            </div>

                                            <!-- Contact Person 2 -->
                                            <div class="col-md-6">
                                                <input type="text" id="contact2-name" class="form-control mb-2"
                                                    placeholder="Enter Person 2 Name" style="padding: 5px 10px" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="contact2-number" class="form-control mb-2"
                                                    placeholder="Enter Person 2 Number" style="padding: 5px 10px" />
                                            </div>

                                            <!-- Contact Person 3 -->
                                            <div class="col-md-6">
                                                <input type="text" id="contact3-name" class="form-control mb-2"
                                                    placeholder="Enter Person 3 Name" style="padding: 5px 10px" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="contact3-number" class="form-control"
                                                    placeholder="Enter Person 3 Number" style="padding: 5px 10px" />
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">Please enter at least one contact person.</div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-sm btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success btn-sm" id="add-btn">Create
                                            Company</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- delete confirmation --}}                
                <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="btn-close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mt-2 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                        colors="primary:#f7b84b,secondary:#f06548"
                                        style="width:100px;height:100px"></lord-icon>
                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                        <h4>Are you Sure ?</h4>
                                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record
                                            ?</p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                    <button type="button" class="btn w-sm btn-light btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn w-sm btn-danger btn-sm"
                                        wire:click="deleteCompany" id="delete-record">Yes,
                                        Delete It!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
            </div>
        </div>
    </div>

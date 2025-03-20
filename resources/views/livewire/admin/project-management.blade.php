    <style>
        td {
            font-size: 12px
        }

        /* Table Head (th) Spacing Adjust */
        #projectsTable thead th {
            padding: 5px 70px;
            white-space: nowrap;
        }

        /* Table Cells (td) spacing */
        #projectsTable tbody td {
            padding: 8px 70px;
        }
    </style>

    <div>
        <div class="page-content">
            <div class="container-fluid">
                {{-- create project button --}}
                <div class="flex-shrink-0 d-flex justify-content-between mb-2">
                    <h5>Project</h5>
                    <button class="btn btn-success add-btn btn-sm" data-bs-toggle="modal" data-bs-target="#projectModal">
                        <i class="ri-add-line align-bottom me-1"></i> Create Project
                    </button>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="projectsList">
                            <div class="card-body border-end-0 border-start-0 p-2 m-0">
                                <form>
                                    {{-- seach box --}}
                                    <div class="row align-items-center g-2">
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="search-box" style="max-width: 300px;">
                                                <input type="text" class="form-control search bg-light border-light"
                                                    placeholder="Search Projects..."
                                                    style="padding: 5px 35px; margin: 0; font-size: 12px;">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Table Section -->
                            <div class="card-body">
                                <div class="table-responsive table-card mb-0">
                                    <table class="table align-middle table-hover mb-0" id="projectsTable">
                                        <thead class="table-light text-muted">
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Company Name</th>
                                                <th>Assigned To</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($projects && $projects->count() > 0)
                                                @foreach ($projects as $project)
                                                    <tr>
                                                        <td>{{ $project->project_name }}</td>
                                                        <td>{{ $project->company->company_name ?? 'N/A' }}</td>
                                                        <td>{{ $project->staff->first_name ?? 'N/A' }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                {{-- edit button  --}}
                                                                <i class="ri-pencil-fill edit-icon"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#projectModal"></i>

                                                                {{-- delete --}}
                                                                <i class="ri-delete-bin-fill delete-icon"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteRecordModal"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4" class="text-center">No Projects Found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

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

                {{-- Project Form Modal --}}
                <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light" style="padding: 14px 20px">
                                <h5 class="modal-title" id="projectModalLabel" style="font-size: 14px;">Create Project
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="tablelist-form" autocomplete="off">
                                <div class="modal-body">
                                    {{-- company name  --}}
                                    <div class="position-relative">
                                        <label for="company-name" class="form-label"
                                            style="margin-bottom: 5px; margin-top: 0px;">Company Name</label>
                                        <select id="company-name" class="form-control choice" required>
                                            <option value="">Select Company</option>
                                            <option value="1">TryangleTech</option>
                                            <option value="2">PepperWork</option>
                                            <option value="3">ABC Ltd</option>
                                        </select>
                                        {{-- <i class="ri-arrow-down-s-line dropdownProject-icon"></i> --}}
                                        <div class="invalid-feedback">Please select a company.</div>
                                    </div>

                                    {{-- asssign staff --}}
                                    <div class="position-relative mt-2">
                                        <label for="assigned-staff" class="form-label"
                                            style="margin-bottom: 5px; margin-top: 0px;">Assigned Staff Member</label>
                                        <select id="assigned-staff" class="form-control choice" required>
                                            <option value="">Select Staff</option>
                                            <option value="1">John Doe</option>
                                            <option value="2">Jane Smith</option>
                                            <option value="3">Robert Brown</option>
                                        </select>
                                        {{-- <i class="ri-arrow-down-s-line dropdownProject-icon"></i> --}}
                                        <div class="invalid-feedback">Please select a staff member.</div>
                                    </div>

                                    {{-- project name --}}
                                    <div class="mt-2">
                                        <label for="project-name-field" class="form-label"
                                            style="margin-bottom: 5px; margin-top: 0px;">Project Name</label>
                                        <input type="text" id="project-name-field" class="form-control"
                                            placeholder="Enter Project Name" required style="padding: 5px 10px" />
                                        <div class="invalid-feedback">Please enter a project name.</div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-sm">Save Project</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Delete Confirmation Modal --}}
                <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#f7b84b,secondary:#f06548"
                                    style="width:100px;height:100px"></lord-icon>
                                <h4>Are you sure?</h4>
                                <p class="text-muted">Do you really want to delete this project?</p>
                                <button type="button" class="btn btn-light btn-sm"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger btn-sm">Yes, Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

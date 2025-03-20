<style>
    td {
        font-size: 12px
    }

    /* Table Head (th) Spacing Adjust */
    #tasksTable thead th {
        padding: 5px 50px;
        white-space: nowrap;
    }

    /* Table Cells (td) spacing */
    #tasksTable tbody td {
        padding: 8px 50px;
    }
</style>

<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="flex-shrink-0 d-flex justify-content-between mb-2">
                <h5>Tasks</h5>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-success add-btn btn-sm" data-bs-toggle="modal" data-bs-target="#taskModal">
                        <i class="ri-add-line align-bottom "></i> Create Task
                    </button>
                    <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()">
                        <i class="ri-delete-bin-2-line"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="tasksList">
                        <div class="card-header border-0 m-0 p-2">
                            <div class="d-flex align-items-center">
                                {{-- <h5 class="card-title mb-0 flex-grow-1">Tasks</h5> --}}
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    {{-- seachbox --}}
                                    <div class="search-box">
                                        <input type="text" class="form-control search bg-light border-light"
                                            placeholder="Search for tasks or something..."
                                            style="padding: 5px 35px; margin: 0; font-size: 12px;">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                       {{--  --}}
                        <div class="card-body">
                            <div class="table-responsive table-card mb-0">
                                <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                                    <thead class="table-light text-muted">
                                        <tr>
                                            <th data-sort="tasks_name">Task Name</th>
                                            <th data-sort="client_name">Project Name</th>
                                            <th data-sort="client_name">Company Name</th>
                                            <th data-sort="assignedto">Assigned To</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <tr>
                                            {{-- Task name --}}
                                            <td>
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 tasks_name">Profile Page Structure</div>
                                                </div>
                                            </td>
                                            {{-- Project name --}}
                                            <td>
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 tasks_name">Project1</div>
                                                </div>
                                            </td>
                                            {{-- Company name --}}
                                            <td class="client_name">Robert McMahon</td>
                                            {{-- assign --}}
                                            <td class="assignedto">
                                                <div class="avatar-group">
                                                    <a href="javascript:void(0);" class="avatar-group-item"
                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        data-bs-placement="top" title="Frank">
                                                        <img src="assets/images/users/avatar-3.jpg" alt=""
                                                            class="rounded-circle avatar-xxs" />
                                                    </a>
                                                    <a href="javascript:void(0);" class="avatar-group-item"
                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        data-bs-placement="top" title="Anna">
                                                        <img src="assets/images/users/avatar-1.jpg" alt=""
                                                            class="rounded-circle avatar-xxs" />
                                                    </a>
                                                </div>
                                            </td>
                                            {{-- Action --}}
                                            <td>
                                                <div class="d-flex gap-2">
                                                    {{-- edit button  --}}
                                                    <i class="ri-pencil-fill edit-icon" data-bs-toggle="modal"
                                                        data-bs-target="#taskModal"></i>

                                                    {{-- delete --}}
                                                    <i class="ri-delete-bin-fill delete-icon" data-bs-toggle="modal"
                                                        data-bs-target="#deleteRecordModal"></i>
                                                   
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{-- search error message --}}
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a"
                                            style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 200k+ tasks but did not find
                                            any
                                            tasks matching your search.</p>
                                    </div>
                                </div>
                            </div>
                            {{-- pagination --}}
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

            {{-- model form --}}
            <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light" style="padding: 14px 20px">
                            <h5 class="modal-title" id="taskModalLabel" style="font-size: 14px;">Create Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" autocomplete="off">
                            <div class="modal-body">
                                {{-- Task name  --}}
                                <div class="invalid-feedback">Please enter a task name.</div>
                                <div class="mb-1">
                                    <label for="task-name-field" class="form-label" style="font-size: 13px">Task
                                        Name</label>
                                    <input type="text" id="task-name-field" class="form-control"
                                        placeholder="Enter Task Name" required
                                        style="padding: 5px 10px; font-size: 11px;" />
                                </div>

                                {{-- company name  --}}
                                <div class="position-relative mt-2">
                                    <label for="company-name" class="form-label" style="font-size: 13px">Company
                                        Name</label>
                                    <select id="company-name" class="form-control choice" required>
                                        <option value="">Select Company</option>
                                        <option value="1">TryangleTech</option>
                                        <option value="2">PepperWork</option>
                                        <option value="3">ABC Ltd</option>
                                    </select>
                                    {{-- <i class="ri-arrow-down-s-line dropdownProject-icon"></i> --}}
                                    <div class="invalid-feedback">Please select a company.</div>
                                </div>

                                {{-- select project  --}}
                                <div class=" position-relative mt-2">
                                    <label for="company-name" class="form-label"
                                        style="font-size: 13px">Project</label>
                                    <select id="company-name" class="form-control choice" required>
                                        <option value="">Select Project</option>
                                        <option value="1">Project_1</option>
                                        <option value="2">Project_2</option>
                                        <option value="3">Project_3</option>
                                    </select>
                                    {{-- <i class="ri-arrow-down-s-line dropdownProject-icon"></i> --}}
                                    <div class="invalid-feedback">Please select a project.</div>
                                </div>

                                {{-- assign staff --}}
                                <div class="mt-2">
                                    <label for="assigned-staff" class="form-label" style="font-size: 13px">Assigned
                                        Staff
                                        Member</label>
                                    <select id="assigned-staff" class="form-control choice" required>
                                        <option value="">Select Staff</option>
                                        <option value="1">John Doe</option>
                                        <option value="2">Jane Smith</option>
                                        <option value="3">Robert Brown</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a staff member.</div>
                                </div>

                                {{-- Remark / Description --}}
                                <div class="mt-2">
                                    <label for="remark-description" class="form-label"
                                        style="font-size: 13px">Remark</label>
                                    <textarea id="remark-description" class="form-control" rows="3" placeholder="Enter remarks here..." required></textarea>
                                    <div class="invalid-feedback">Please enter a remark </div>
                                </div>

                            </div>
                            {{-- Create task form button --}}
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-sm" id="add-task-btn">Create
                                        Task</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- delete confirmation --}}
            <!-- Modal -->
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
                                    <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light btn-sm"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger btn-sm" id="delete-record">Yes,
                                    Delete
                                    It!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal -->
        </div>
        <!-- container-fluid -->
    </div>

</div>

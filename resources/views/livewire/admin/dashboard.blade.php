<style>
    .card-header {
        padding: 5px 15px;
        margin-bottom: 0;
    }

    .form-input {
        padding: 5px 10px;
        font-size: 11px;
    }

    .form-lable {
        font-size: 13px;
    }

    /* spacing related */
    .task-filter-bar {
        margin-top: 0px !important;
        padding-top: 5px !important;
    }

    /* table body */
    .card-body {
        padding-top: 8px !important;
        padding-bottom: 0px !important;
    }

    /* table spacing  */
    .table th,
    .table td {
        padding: 6px !important;
    }

    td {
        font-size: 12px
    }

    /* .table thead th {
        padding: 3px 8px !important;
    } */

    /* .table tbody tr {
        margin: 0 !important;
        padding: 0 !important;
    } */
</style>

<div class="page-content">
    <div class="container-fluid">
        {{-- Key Metrics Section --}}
        <div class="row">
            {{-- Today Assigned Task --}}
            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted mb-1">Today Assigned Task</p>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-success-subtle rounded fs-3">
                                    <i class="bx bx-task text-success"></i>
                                </span>
                            </div>
                        </div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value"
                                data-target="10">0</span></h4>
                    </div>
                </div>
            </div>

            {{-- Incomplete Task --}}
            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted mb-1">Incomplete Task</p>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-danger-subtle rounded fs-3">
                                    <i class="bx bx-error text-danger"></i>
                                </span>
                            </div>
                        </div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value"
                                data-target="25">0</span></h4>
                    </div>
                </div>
            </div>

            {{-- High Priority Incomplete Task --}}
            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted mb-1">High Priority Incomplete Task</p>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-warning-subtle rounded fs-3">
                                    <i class="bx bx-bell text-warning"></i>
                                </span>
                            </div>
                        </div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value"
                                data-target="5">0</span></h4>
                    </div>
                </div>
            </div>

            {{-- Overdue Incomplete Task --}}
            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted mb-1">Overdue Incomplete Task</p>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle rounded fs-3">
                                    <i class="bx bx-time text-primary"></i>
                                </span>
                            </div>
                        </div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value"
                                data-target="8">0</span></h4>
                    </div>
                </div>
            </div>
        </div>
        {{-- Key Metrics Section End --}}

        {{-- main content --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="tasksList">
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Tasks List</h5>
                            <div class="flex-shrink-0">
                                <button class="btn btn-success add-btn btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#showModal">
                                    <i class="ri-add-line align-bottom me-1"></i> Create Task
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body border-top border-end-0 border-start-0 task-filter-bar">
                        <form>
                            <div class="row align-items-center g-2 ">
                                {{-- Search --}}
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="search-box">
                                        <input type="text" class="form-control search bg-light border-light"
                                            placeholder="Search Tasks..."
                                            style="padding: 5px 35px; margin: 0; font-size: 12px;">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>

                                {{-- Task Type --}}
                                <div class="col-lg-2 col-md-3 col-sm-6 position-relative">
                                    <select class="form-control choice" id="taskType">
                                        <option value="">Task Type</option>
                                        <option value="Regular Task">Regular Task</option>
                                        <option value="Assign Task">Assign Task</option>
                                    </select>                                  
                                </div>

                                {{-- Date Range (Without Icon) --}}
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <input type="date" class="form-control custom-date" id="dateRange"
                                        data-provider="flatpickr" placeholder="Select Date Range"
                                        style="padding: 5px 15px; margin: 0; font-size: 12px;">
                                </div>

                                {{-- Status --}}
                                <div class="col-lg-2 col-md-3 col-sm-6 position-relative">
                                    <select class="form-control choice" id="taskStatus">
                                        <option value="">Status</option>
                                        <option value="All" selected>All</option>
                                        <option value="Pending">Pending</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                    </select>                                  
                                </div>

                                {{-- Priority --}}
                                <div class="col-lg-2 col-md-3 col-sm-6 position-relative">
                                    <select class="form-control choice" id="taskPriority">
                                        <option value="">Priority</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>                                    
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Table Section -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Task Name</th>
                                        <th>Task Type</th>
                                        <th>Company</th>
                                        <th>Assigned To</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#" class="fw-medium link-primary">1</a></td>
                                        <td>Profile Page Structure</td>
                                        <td><span class="badge bg-info">Regular Task</span></td>
                                        <td>ABC Ltd</td>
                                        <td>John Doe</td>
                                        <td>25 Jan, 2024</td>
                                        <td><span class="badge bg-secondary">Completed</span></td>
                                        <td><span class="badge bg-danger">High</span></td>
                                        <td>
                                            <div class="btn-group gap-2">
                                                {{-- edit button  --}}
                                                <i class="ri-pencil-fill edit-icon" data-bs-toggle="modal"
                                                    data-bs-target="#showModal"></i>

                                                {{-- delete --}}
                                                <i class="ri-delete-bin-fill delete-icon" data-bs-toggle="modal"
                                                    data-bs-target="#deleteOrder"></i>                                               
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td><a href="#" class="fw-medium link-primary">2</a></td>
                                        <td>Database Optimization</td>
                                        <td><span class="badge bg-warning">Assign Task</span></td>
                                        <td>XYZ Ltd</td>
                                        <td>Jane Smith</td>
                                        <td>30 Jan, 2024</td>
                                        <td><span class="badge bg-primary">In Progress</span></td>
                                        <td><span class="badge bg-success">Medium</span></td>
                                        <td>
                                            <div class="btn-group gap-2">

                                                {{-- edit button  --}}
                                                <i class="ri-pencil-fill edit-icon" data-bs-toggle="modal"
                                                    data-bs-target="#showModal" ></i>

                                                {{-- delete --}}
                                                <i class="ri-delete-bin-fill delete-icon" data-bs-toggle="modal"
                                                    data-bs-target="#deleteOrder"></i>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-2">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- delete model --}}
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
                                <button class="btn btn-link btn-ghost-success btn-sm fw-medium text-decoration-none"
                                    id="deleteRecord-close" data-bs-dismiss="modal"><i
                                        class="ri-close-line me-1 align-middle"></i> Close</button>
                                <button class="btn btn-danger btn-sm" id="delete-record">Yes, Delete It</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end delete modal -->

        {{-- form model --}}
        <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header bg-light" style="padding: 14px 20px">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 14px;">Create Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                    </div>
                    <form class="tablelist-form" autocomplete="off">
                        <div class="modal-body">
                            <input type="hidden" id="tasksId" />
                            <div class="row g-2">
                                {{-- project name --}}
                                {{-- <div class="col-lg-6">
                                    <label for="projectName-field" class="form-label form-lable">Project
                                        Name</label>
                                    <input type="text" id="projectName-field" class="form-control form-input"
                                        placeholder="Project name" required />
                                </div> --}}
                                {{-- select project  --}}
                                <div class="col-lg-6">
                                    <label for="project-name" class="form-label" style="font-size: 13px">Project
                                        Name</label>
                                    <select id="project-name" class="form-control choice" required>
                                        <option value="">Select Project</option>
                                        <option value="1">Project_1</option>
                                        <option value="2">Project_2</option>
                                        <option value="3">Project_3</option>
                                    </select>
                                    {{-- <i class="ri-arrow-down-s-line dropdownProject-icon"></i> --}}
                                    <div class="invalid-feedback">Please select a project.</div>
                                </div>

                                {{-- Title --}}
                                {{-- <div class="col-lg-6">
                                    <div>
                                        <label for="tasksTitle-field" class="form-label form-lable">Title</label>
                                        <input type="text" id="tasksTitle-field" class="form-control form-input"
                                            placeholder="Title" required />
                                    </div>
                                </div>
                                 --}}
                                {{-- Task Type --}}
                                <div class="col-lg-6">
                                    <label for="Task-Type" class="form-label" style="font-size: 13px">Task
                                        Type</label>
                                    <select class="form-control choice" id="Task-Type">
                                        <option value="">Task Type</option>
                                        <option value="Regular Task">Regular Task</option>
                                        <option value="Assign Task">Assign Task</option>
                                    </select>
                                    {{-- <i class="ri-arrow-down-s-line dropdownDashboard-icon"></i> <!-- Dropdown Icon --> --}}
                                </div>
                                {{-- client name --}}
                                {{-- <div class="col-lg-6">
                                    <label for="clientName-field" class="form-label form-lable">Client Name</label>
                                    <input type="text" id="clientName-field" class="form-control form-input"
                                        placeholder="Client name" required />
                                </div> --}}

                                {{-- company name  --}}
                                <div class="col-lg-6">
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
                                {{-- assign staff --}}
                                <div class="col-lg-6">
                                    <label for="assigned-staff" class="form-label form-lable">Assigned Staff
                                        Member</label>
                                    <select id="assigned-staff" class="form-control choice" required>
                                        <option value="">Select Staff</option>
                                        <option value="1">John Doe</option>
                                        <option value="2">Jane Smith</option>
                                        <option value="3">Robert Brown</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a staff member.</div>
                                </div>
                                {{-- Due Date --}}
                                <div class="col-lg-6">
                                    <label for="duedate-field" class="form-label form-lable">Due Date</label>
                                    <input type="date" id="duedate-field" class="form-control form-input"
                                        data-provider="flatpickr" placeholder="Due date" required />
                                </div>
                                {{-- status --}}
                                <div class="col-lg-6">
                                    <label for="ticket-status" class="form-label form-lable">Status</label>
                                    <select class="form-control choice" id="ticket-status">
                                        <option value="">Status</option>
                                        <option value="Inprogress">Inprogress</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                                {{-- Priority --}}
                                <div class="col-lg-12">
                                    <label for="priority-field" class="form-label form-lable">Priority</label>
                                    <select class="form-control choice" id="priority-field">
                                        <option value="">Priority</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light btn-sm" id="close-modal"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-sm" id="add-btn">Create
                                    Task</button>
                                {{-- <button type="button" class="btn btn-success" id="edit-btn">Update Task</button>  --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end modal-->

    </div>
    <!-- container-fluid -->
</div>

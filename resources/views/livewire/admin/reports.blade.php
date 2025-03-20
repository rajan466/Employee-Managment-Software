<style>
    .report-btn {
        padding: 5px 10px;
        margin: 15px;
        font-size: 11px;
    }

    .table-responsive-report-deails {
        overflow: visible !important;
    }

    .modal-body {
        overflow-y: auto;
        max-height: 65vh;
        padding-top: 0 !important;
    }

    thead.table-ligth-style {
        border-bottom: 2px solid #ddd;
        box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        {{-- create button --}}
        <div class="flex-shrink-0 d-flex justify-content-between mb-2 gap-2">
            <h5>Report</h5>
            <div class="flex-shrink-0 d-flex justify-content-between mb-1 gap-2">
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-success add-btn btn-sm" data-bs-toggle="modal" data-bs-target="#taskModal">
                        <i class="ri-add-line align-bottom me-1"></i> Create Task
                    </button>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-primary add-btn btn-sm" data-bs-toggle="modal"
                        data-bs-target="#reportDetailsModal">
                        <i class="ri-add-line align-bottom me-1"></i> Add Report
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="tasksList">
                    {{-- <div class="card-header border-0">
                            <div class="d-flex align-items-center">                                
                                <h5 class="card-title mb-0 flex-grow-1">Reports</h5>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-wrap gap-2">
                                        <button class="btn btn-danger add-btn btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#taskModal">
                                            <i class="ri-add-line align-bottom me-1"></i> Create Task
                                        </button>
                                        <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()">
                                            <i class="ri-delete-bin-2-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    <div class="card-body m-0 p-2">
                        <form>
                            <div class="row align-items-center g-1">
                                {{-- Search --}}
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="search-box">
                                        <input type="text" class="form-control search bg-light border-light"
                                            placeholder="Search..."
                                            style="padding: 5px 35px; margin: 0; font-size: 12px;">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>

                                {{-- Select Staff --}}
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <select class="form-control choice" data-choices name="staffSelect">
                                        <option value="">Select Staff</option>
                                        <option value="Rajan">Heena</option>
                                        <option value="Darshna">Darshna</option>
                                    </select>
                                </div>

                                {{-- Select Company --}}
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <select class="form-control choice" id="companySelect">
                                        <option value="">Select Company</option>
                                        <option value="Company A">Company A</option>
                                        <option value="Company B">Company B</option>
                                    </select>
                                </div>

                                {{-- Select Tasks --}}
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <select class="form-control choice" data-choices id="taskSelect">
                                        <option value="">Select Task</option>
                                        <option value="Task 1">Task 1</option>
                                        <option value="Task 2">Task 2</option>
                                    </select>
                                </div>

                                 {{-- Task Type --}}
                                 {{-- <div class="col-lg-2 col-md-2 col-sm-6">
                                    <select class="form-control choice" id="taskType">
                                        <option value="">Task Type</option>
                                        <option value="Regular Task">Regular Task</option>
                                        <option value="Assign Task">Assign Task</option>
                                    </select>                                   
                                </div> --}}


                                {{-- Status --}}
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <select class="form-control choice" data-choices id="statusSelect">
                                        <option value="">Status</option>
                                        <option value="all">All</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>

                                {{-- Select Date Range --}}
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <select class="form-control choice" data-choices id="dateRange">
                                        <option value="">Date Range</option>
                                        <option value="all">Today</option>
                                        <option value="Pending">This Week</option>
                                        <option value="Completed">This Month</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card mb-0">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Staff Name</th>
                                        <th>Date</th>
                                        <th>Total Tasks</th>
                                        <th>Completed Tasks</th>
                                        <th>In-Progress Tasks</th>
                                        <th>Total Time Spent</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>2025-02-22</td>
                                        <td>5</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>6 Hours</td>
                                        <td>
                                            <div class="btn-group gap-2">

                                                {{-- edit button  --}}
                                                <i class="ri-pencil-fill edit-icon" data-bs-toggle="modal"
                                                    data-bs-target="#reportDetailsModal"></i>

                                                {{-- delete --}}
                                                <i class="ri-delete-bin-fill delete-icon" data-bs-toggle="modal"
                                                    data-bs-target="#deleteOrder"></i>


                                                {{-- <button class="btn btn-sm btn-warning" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target="#reportDetailsModal">
                                                    <i class="ri-pencil-fill"></i>
                                                </button> --}}
                                                {{-- <button class="btn btn-sm btn-danger" title="Delete"
                                                    data-bs-toggle="modal" data-bs-target="#deleteOrder">
                                                    <i class="ri-delete-bin-fill"></i>
                                                </button> --}}
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- demo choice dropdown just for  testing --}}
        {{-- <div>
                        
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <label for="choices-single-default-1" class="form-label text-muted">Default</label>
                        <p class="text-muted">Set <code>data-choices</code> attribute to set a default single select.</p>
                        <select class="form-control choice" data-choices name="choices-single-default">
                            <option value="">This is a placeholder</option>
                            <option value="Choice 1">Choice 1</option>
                            <option value="Choice 2">Choice 2</option>
                            <option value="Choice 3">Choice 3</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <label for="choices-single-default-2" class="form-label text-muted">Default</label>
                        <p class="text-muted">Set <code>data-choices</code> attribute to set a default single select.</p>
                        <select class="form-control choice" data-choices name="choices-single-default">
                            <option value="">This is a placeholder</option>
                            <option value="Choice 1">Choice 1</option>
                            <option value="Choice 2">Choice 2</option>
                            <option value="Choice 3">Choice 3</option>
                        </select>
                        <!--end row-->
                    </div>
            </div>
        </div> --}}



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
                                <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none"
                                    id="deleteRecord-close" data-bs-dismiss="modal"><i
                                        class="ri-close-line me-1 align-middle btn-sm"></i> Close</button>
                                <button class="btn btn-danger btn-sm" id="delete-record">Yes, Delete It</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end delete modal -->

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
                            <div class="mt-2">
                                <label for="task-name-field" class="form-label" style="font-size: 13px">Task
                                    Name</label>
                                <input type="text" id="task-name-field" class="form-control"
                                    placeholder="Enter Task Name" required
                                    style="padding: 5px 10px; font-size: 11px;" />
                            </div>

                            {{-- company name  --}}
                            <div class=" mt-2 position-relative">
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
                            <div class=" mt-2 position-relative">
                                <label for="company-name" class="form-label" style="font-size: 13px">Project</label>
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

        <!-- Report Details Modal -->
        <div class="modal fade" id="reportDetailsModal" tabindex="-1" aria-labelledby="reportDetailsLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered custom-modal-width">
                <div class="modal-content custom-modal-height">
                    <!-- Header Name and Close Icon -->
                    <div class="modal-header border-0 bg-light" style="padding: 14px 20px">
                        <h5 class="modal-title" id="reportDetailsLabel" style="font-size: 14px;">Report Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <!-- Scrollable Content -->
                    <div class="modal-body p-3" style="overflow-y: auto; max-height: 60vh;">
                        <div class="table-responsive table-responsive-report-deails table-card mt-0">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light table-ligth-style text-muted sticky-top">
                                    <tr>
                                        <th>Task Type</th>
                                        <th>Company Name</th>
                                        <th>Project Name</th>
                                        <th>Task Name</th>
                                        <th>Remarks/Notes</th>
                                        <th>Total Time Invested</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="taskTableBody">
                                    <tr class="align-items-center g-2">
                                        {{-- task type  --}}
                                        <td>
                                            <select class="form-control choice">
                                                <option>Regular Task</option>
                                                <option>Assign Task</option>
                                            </select>
                                        </td>
                                        {{-- company name --}}
                                        <td>
                                            <select class="form-control choice">
                                                <option>Company A</option>
                                                <option>Company B</option>
                                            </select>
                                        </td>
                                        {{-- project name --}}
                                        <td>
                                            <select class="form-control choice">
                                                <option>Project X</option>
                                                <option>Project Y</option>
                                            </select>
                                        </td>
                                        {{-- task name --}}
                                        <td>
                                            <select class="form-control choice">
                                                <option>Task X</option>
                                                <option>Task Y</option>
                                            </select>
                                        </td>
                                        {{-- remarks --}}
                                        <td>
                                            <input type="text" class="form-control" placeholder="Enter remarks"
                                                style="padding: 5px 10px; font-size: 11px;">
                                        </td>
                                        {{-- total time invested --}}
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <select class="form-control choice"
                                                    style="padding: 5px 10px; font-size: 11px;">
                                                    <option value="min">Min &nbsp;&nbsp;&nbsp;&nbsp;</option>
                                                    <option value="hrs">Hrs &nbsp;&nbsp;&nbsp;&nbsp;</option>
                                                </select>
                                                <input type="number" class="form-control ms-2 flex-grow-1"
                                                    placeholder="Enter time"
                                                    style="padding: 5px 10px; font-size: 11px;">
                                            </div>
                                        </td>
                                        {{-- delete --}}
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger ms-2" title="Delete"
                                                onclick="removeRow(this)">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Add Button -->
                            <button type="button" class="btn btn-success report-btn mt-2" onclick="addNewRow()">
                                <i class="ri-add-line"></i> Add
                            </button>
                        </div> <!-- End Table -->
                    </div>

                    <!-- Fixed Footer -->
                    <div class="modal-footer bg-light border-0 d-flex justify-content-between align-items-center"
                        style="position: sticky; bottom: 0; width: 100%; padding: 14px 20px;">
                        <h6 class="mb-0">Total Time Invested: <span id="totalTime">00:00 Hrs</span></h6>
                        <button type="button" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Report Details Modal -->

        <script>
            function addNewRow() {
                let tableBody = document.getElementById("taskTableBody");
                let newRow = tableBody.rows[0].cloneNode(true);
                let rowCount = tableBody.rows.length + 1;
                // newRow.cells[0].innerText = rowCount;
                tableBody.appendChild(newRow);
            }

            function removeRow(button) {
                let row = button.closest("tr");
                row.remove();
            }

            // document.addEventListener("DOMContentLoaded", function() {
            //     new Choices("#choices-single-default", {
            //         removeItemButton: true, // Enables removal of selected items
            //         searchEnabled: true, // Enables search functionality                   
            //     });
            // });


            // real code
            // document.addEventListener("DOMContentLoaded", function() {
            //     if (document.querySelector("#choices-single-default")) {
            //         new Choices("#choices-single-default", {
            //             removeItemButton: true
            //         });
            //     }
            // });

            // document.addEventListener("DOMContentLoaded", function() {
            //     if (document.querySelector(".choice")) {
            //         new Choices(".choice", {
            //             removeItemButton: true
            //         });
            //     }
            // });

            // document.addEventListener("DOMContentLoaded", function() {
            //     document.querySelectorAll(".choice").forEach(function(element) {
            //         new Choices(element, {
            //             removeItemButton: true
            //         });
            //     });
            // });
        </script>

    </div>
</div>

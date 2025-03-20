<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="reportDetails">
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Report Details</h5>
                            <div class="flex-shrink-0">
                                <button class="btn btn-danger add-btn" data-bs-toggle="modal"
                                    data-bs-target="#taskModal"><i class="ri-add-line align-bottom me-1"></i> Create Today’s Task</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card mb-4">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Company Name</th>
                                        <th>Total Time Invested</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>Company A</td>
                                        <td>2 Hours</td>
                                        <td>Completed UI Design</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a"
                                        style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">No tasks available.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add Today's Task Modal -->
        <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="taskModalLabel">Create Today’s Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form autocomplete="off">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Select Task Date</label>
                                <input type="date" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Task</label>
                                <select class="form-control" required>
                                    <option value="">Select Task</option>
                                    <option value="1">Task 1</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Company</label>
                                <select class="form-control" required>
                                    <option value="">Select Company</option>
                                    <option value="A">Company A</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter Time (in Minutes)</label>
                                <input type="number" class="form-control" placeholder="Enter time" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Final Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter description" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>


{{-- dropdown scripts --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Choices("#taskType", { searchEnabled: false });
        new Choices("#companyName", { searchEnabled: false });
        new Choices("#projectName", { searchEnabled: false });
        new Choices("#taskName", { searchEnabled: false });
        new Choices("#timeUnit", { searchEnabled: false });
    });
</script>

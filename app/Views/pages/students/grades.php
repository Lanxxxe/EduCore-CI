<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold px-4 py-3 ">Hello! <span class="text-primary">Student</span></p>
        <p class="text-secondary">Student / <?= esc($page) ?></p>
    </div>

    <p class="fs-5 fw-bold ps-3 mt-4">Grades</p>

    <div class=" p-3 shadow-sm mt-3 gap-3">
        <!-- Grade Summary Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5 class="card-title">Overall GPA</h5>
                        <div class="d-flex align-items-baseline">
                            <h2 class="me-2">3.65</h2>
                            <span class="badge bg-success">Good Standing</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5 class="card-title">Total Credit</h5>
                        <div class="d-flex align-items-baseline">
                            <h2 class="me-2">15</h2>
                            <span class="text-muted">/ 120 Total</span>
                        </div>
                        <div class="progress mt-2" style="height: 6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 12.5%;" aria-valuenow="12.5" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grades Table -->
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Course Grades</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Term</th>
                                <th>Credits</th>
                                <th>Grade</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="grade-A">
                                <td>
                                    <div class="fw-bold">Math 101</div>
                                    <small class="text-muted">Advanced Mathematics</small>
                                </td>
                                <td>1st</td>
                                <td>4</td>
                                <td>A-</td>
                                <td><span class="badge bg-success">In Progress</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#gradeDetailsModal">Details</button>
                                </td>
                            </tr>
                            <tr class="grade-A">
                                <td>
                                    <div class="fw-bold">History 202</div>
                                    <small class="text-muted">World History</small>
                                </td>
                                <td>1st</td>
                                <td>3</td>
                                <td>A</td>
                                <td><span class="badge bg-success">In Progress</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                </td>
                            </tr>
                            <tr class="grade-B">
                                <td>
                                    <div class="fw-bold">English 101</div>
                                    <small class="text-muted">Composition</small>
                                </td>
                                <td>1st</td>
                                <td>3</td>
                                <td>B</td>
                                <td><span class="badge bg-success">In Progress</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                </td>
                            </tr>
                            <tr class="grade-C">
                                <td>
                                    <div class="fw-bold">Science 202</div>
                                    <small class="text-muted">Physical Sciences</small>
                                </td>
                                <td>1st</td>
                                <td>4</td>
                                <td>C+</td>
                                <td><span class="badge bg-success">In Progress</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Details</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>



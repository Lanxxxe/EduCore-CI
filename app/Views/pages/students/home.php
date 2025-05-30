<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold px-4 py-3 ">Hello! <span class="text-primary">Student</span></p>
        <p class="text-secondary">Student / <?= esc($page) ?></p>
    </div>

    <p class="fs-5 fw-bold ps-3 mt-4">Dashboard</p>

    <div class="p-3 shadow-sm mt-3">
        <!-- Stats Row -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stat-card primary">
                    <div class="card-body">
                        <h5 class="card-title">4</h5>
                        <p class="card-text text-muted">Enrolled Classes</p>
                        <i class="bi bi-book fs-4 text-primary opacity-25 position-absolute bottom-0 end-0 me-3 mb-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card warning">
                    <div class="card-body">
                        <h5 class="card-title">2</h5>
                        <p class="card-text text-muted">Pending Assignments</p>
                        <i class="bi bi-clipboard-check fs-4 text-warning opacity-25 position-absolute bottom-0 end-0 me-3 mb-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Pending Assignments</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Math Problem Set #5</h6>
                                    <small class="text-muted">Math 101</small>
                                </div>
                                <span class="badge bg-danger rounded-pill">Due Tomorrow</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Essay on Historical Events</h6>
                                    <small class="text-muted">History 202</small>
                                </div>
                                <span class="badge bg-warning rounded-pill">Due in 3 days</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">Lab Report</h6>
                                    <small class="text-muted">Science 202</small>
                                </div>
                                <span class="badge bg-primary rounded-pill">Due next week</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div> -->

        
    </div>
    <!-- Classes Preview -->
    <p class="fs-5 fw-bold text-muted ps-3 mt-4">Enrolled Classes</p>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4 p-3 shadow-sm">
        <div class="col">
            <div class="card course-card">
                <div class="card-img-top position-relative" style="height: 100px; background-color: #3262a8;">
                    <span class="badge bg-success">In Progress</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Math 101</h5>
                    <p class="card-text">Advanced Mathematics</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Prof. Smith</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card course-card">
                <div class="card-img-top position-relative" style="height: 100px; background-color: #28a745;">
                    <span class="badge bg-success">In Progress</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Science 202</h5>
                    <p class="card-text">Physical Sciences</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Prof. Johnson</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card course-card">
                <div class="card-img-top position-relative" style="height: 100px; background-color: #dc3545;">
                    <span class="badge bg-success">In Progress</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">History 202</h5>
                    <p class="card-text">World History</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Prof. Davis</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card course-card">
                <div class="card-img-top position-relative" style="height: 100px; background-color: #ffc107;">
                    <span class="badge bg-success">In Progress</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">English 101</h5>
                    <p class="card-text">Composition</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Prof. Wilson</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



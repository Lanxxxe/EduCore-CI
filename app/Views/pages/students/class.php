<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold px-4 py-3 ">Hello! <span class="text-primary">Student</span></p>
        <p class="text-secondary">Student / <?= esc($page) ?></p>
    </div>

    <p class="fs-5 fw-bold ps-3 mt-4">Classes</p>

    <div class=" p-3 shadow-sm mt-3">
        <!-- Filter Controls -->
        <!-- <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search classes...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option selected>All Terms</option>
                            <option>Fall 2023</option>
                            <option>Spring 2024</option>
                            <option>Summer 2024</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option selected>All Status</option>
                            <option>In Progress</option>
                            <option>Completed</option>
                            <option>Upcoming</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end">
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-funnel"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Class Cards -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Math 101 -->
            <div class="col">
                <div class="card course-card h-100">
                    <div class="card-img-top position-relative" style="height: 120px; background-color: #3262a8;">
                        <span class="badge bg-success">In Progress</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Math 101</h5>
                        <p class="card-text">Advanced Mathematics</p>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://ui-avatars.com/api/?name=Smith&background=224b82&color=fff" class="rounded-circle me-2" width="24" height="24" alt="Professor">
                            <span class="text-muted">Prof. Smith</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="btn btn-sm btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#classDetailsModal">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Science 202 -->
            <div class="col">
                <div class="card course-card h-100">
                    <div class="card-img-top position-relative" style="height: 120px; background-color: #28a745;">
                        <span class="badge bg-success">In Progress</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Science 202</h5>
                        <p class="card-text">Physical Sciences</p>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://ui-avatars.com/api/?name=Johnson&background=1e7e34&color=fff" class="rounded-circle me-2" width="24" height="24" alt="Professor">
                            <span class="text-muted">Prof. Johnson</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="btn btn-sm btn-primary ms-auto">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- History 202 -->
            <div class="col">
                <div class="card course-card h-100">
                    <div class="card-img-top position-relative" style="height: 120px; background-color: #dc3545;">
                        <span class="badge bg-success">In Progress</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">History 202</h5>
                        <p class="card-text">World History</p>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://ui-avatars.com/api/?name=Davis&background=bd2130&color=fff" class="rounded-circle me-2" width="24" height="24" alt="Professor">
                            <span class="text-muted">Prof. Davis</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="btn btn-sm btn-primary ms-auto">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- English 101 -->
            <div class="col">
                <div class="card course-card h-100">
                    <div class="card-img-top position-relative" style="height: 120px; background-color: #ffc107;">
                        <span class="badge bg-success">In Progress</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">English 101</h5>
                        <p class="card-text">Composition</p>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://ui-avatars.com/api/?name=Wilson&background=d39e00&color=fff" class="rounded-circle me-2" width="24" height="24" alt="Professor">
                            <span class="text-muted">Prof. Wilson</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="btn btn-sm btn-primary ms-auto">View Details</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    
    </div>
</div>



<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold py-3">Hello Teacher <span class="text-primary">John Doe</span></p>
        <a href="<?= base_url('faculty/addClass')  ?>" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Add Class</a>
    </div>

    <!-- Active Classes -->
    <p class="fs-5 fw-bold ps-3 mt-4">Active Classes</p>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5 p-3 shadow-sm">
        <!-- Math 101 -->
        <div class="col">
            <div class="card h-100 course-card">
                <div class="card-img-top position-relative" style="height: 120px; background-color: #3262a8;">
                    <span class="badge bg-success">Active</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Math 101</h5>
                    <p class="card-text">Advanced Mathematics</p>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">
                            <i class="bi bi-people me-1"></i> 32 Students
                        </span>
                        <span class="text-muted">
                            <i class="bi bi-card-checklist me-1"></i> 5 Assignments
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">MWF 10:00-11:30 AM</small>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                                Manage
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#classDetailsModal"><i class="bi bi-info-circle me-2"></i>View Details</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i>View Students</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-plus me-2"></i>Add Assignment</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-megaphone me-2"></i>Send Announcement</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-archive me-2"></i>Archive Class</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Science 202 -->
        <div class="col">
            <div class="card h-100 course-card">
                <div class="card-img-top position-relative" style="height: 120px; background-color: #28a745;">
                    <span class="badge bg-success">Active</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Science 202</h5>
                    <p class="card-text">Physical Sciences</p>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">
                            <i class="bi bi-people me-1"></i> 28 Students
                        </span>
                        <span class="text-muted">
                            <i class="bi bi-card-checklist me-1"></i> 7 Assignments
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">TR 9:00-10:30 AM</small>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                                Manage
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle me-2"></i>View Details</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i>View Students</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-plus me-2"></i>Add Assignment</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-megaphone me-2"></i>Send Announcement</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-archive me-2"></i>Archive Class</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- History 202 -->
        <div class="col">
            <div class="card h-100 course-card">
                <div class="card-img-top position-relative" style="height: 120px; background-color: #dc3545;">
                    <span class="badge bg-success">Active</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">History 202</h5>
                    <p class="card-text">World History</p>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">
                            <i class="bi bi-people me-1"></i> 29 Students
                        </span>
                        <span class="text-muted">
                            <i class="bi bi-card-checklist me-1"></i> 4 Assignments
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">MWF 1:00-2:30 PM</small>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                                Manage
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle me-2"></i>View Details</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i>View Students</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-plus me-2"></i>Add Assignment</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-megaphone me-2"></i>Send Announcement</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-archive me-2"></i>Archive Class</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



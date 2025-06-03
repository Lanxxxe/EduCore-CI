<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold py-3 ">Hello Teacher <span class="text-primary">John Doe</span></p>
    </div>

    <p class="fs-5 fw-bold ps-3 mt-4">Dashboard</p>

    <div class="row px-3 shadow-sm gap-3">

        <div class="border-start border-3 border-success col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <p>Active Students</p></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">112</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-mortarboard fs-3 text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-start border-3 border-success col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <p>Classes</p></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($numberOfClasses) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-workspace fs-3 text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="border-start border-3 border-success col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <p>Day/s Until End Term</p></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar fs-3 text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- <p class="fs-5 fw-bold ps-3 mt-4">Assignments to Grade</p>
    
    <div class="row px-3 shadow-sm">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Math Problem Set #5</h6>
                                <small class="text-muted">Math 101 • 8 submissions</small>
                            </div>
                            <a href="#" class="btn btn-sm btn-primary">Grade</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Lab Report</h6>
                                <small class="text-muted">Science 202 • 12 submissions</small>
                            </div>
                            <a href="#" class="btn btn-sm btn-primary">Grade</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Essay on Historical Events</h6>
                                <small class="text-muted">History 202 • 4 submissions</small>
                            </div>
                            <a href="#" class="btn btn-sm btn-primary">Grade</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->


    <p class="fs-5 fw-bold ps-3 mt-4">Your Classes</p>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-4 p-3 shadow-sm">
        <?php if ($classes !== []): 
            foreach($classes as $class): ?>    
                <div class="col">
                    <div class="card h-100 course-card">
                        <div class="card-img-top position-relative" style="height: 120px; background-color: #3262a8;">
                            <span class="badge bg-success">Active</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($class['course_code']) ?></h5>
                            <p class="card-text"><?= esc($class['title']) ?></p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">
                                    <i class="bi bi-people me-1"></i> 32 Students
                                </span>
                                <span class="text-muted">
                                    <i class="bi bi-card-checklist me-1"></i> 5 Assignments
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                                        Manage
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#classDetailsModal"><i class="bi bi-info-circle me-2"></i>View Details</a></li>
                                        <li><a class="dropdown-item" href="<?= site_url('faculty/class/update/' . esc($class['id'])) ?>"><i class="bi bi-people me-2"></i>Update</a></li>
                                        <!-- <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i>View Students</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-plus me-2"></i>Add Assignment</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-megaphone me-2"></i>Send Announcement</a></li>
                                        <li><hr class="dropdown-divider"></li> -->
                                        <li><a class="dropdown-item text-danger" href="<?= site_url('faculty/class/delete/' . esc($class['id'])) ?>"><i class="bi bi-archive me-2"></i>Delete Class</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php 
            endforeach; 
                else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center" role="alert">
                            <i class="bi bi-info-circle-fill"></i> No active classes found.
                        </div>
                    </div>
                <?php
            endif;
            ?>
    </div>
</div>



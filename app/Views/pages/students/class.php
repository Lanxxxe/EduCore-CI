<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold px-4 py-3 ">Hello! <span class="text-primary"><?= esc($student['firstname'] . ' ' . $student['lastname'] ) ?></span></p>
        <p class="text-secondary">Student / <?= esc($page) ?></p>
    </div>

    <div class="d-flex align-items-center justify-content-between w-100">
        <p class="fs-5 fw-bold ps-3 mt-4">Classes</p>
        <button type="button" class="btn btn-sm btn-primary mb-0 me-3" data-bs-toggle="modal" data-bs-target="#classCode"><i class="bi bi-plus"></i> Join Class</button>
    </div>

    <div class=" p-3 shadow-sm mt-3">

        <!-- Class Cards -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            <?php if ($classes !== []): 
                foreach($classes as $class): ?>    
                    <div class="col">
                        <div class="card course-card h-100">
                            <div class="card-img-top position-relative" style="height: 120px; background-color: #3262a8;">
                                <span class="badge bg-success">In Progress</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($class['course_code'] . ' ' . $class['id']) ?></h5>
                                <p class="card-text"><?= esc($class['title']) ?></p>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="https://ui-avatars.com/api/?name=<?= esc($class['firstname']) ?>+<?= esc($class['lastname']) ?>&background=224b82&color=fff" class="rounded-circle me-2" width="24" height="24" alt="Professor">
                                    <span class="text-muted">Prof. <?= esc($class['firstname']) . ' ' . esc($class['lastname']) ?></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="<?= site_url('student/class/' . $class['id']) ?>" class="btn btn-sm btn-primary ms-auto">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            <?php 
            endforeach; 
                else: ?>
                    <div class="col w-100">
                        <div class="alert alert-info text-center" role="alert">
                            <i class="bi bi-info-circle-fill"></i> You are not enrolled in any classes.
                        </div>
                    </div>
                <?php
            endif;
            ?>

            <!-- Math 101 -->
            <!-- <div class="col">
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
            </div> -->

            <!-- Science 202 -->
            <!-- <div class="col">
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
            </div> -->

            <!-- History 202 -->
            <!-- <div class="col">
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
            </div> -->

            <!-- English 101 -->
            <!-- <div class="col">
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
            </div> -->


        </div>
    </div>
</div>

<div class="modal fade" id="classCode" tabindex="-1" aria-labelledby="classCodeLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form action="<?= site_url('student/joinClass') ?>" method="post">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="classCodeLabel">Enter Class Code</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="class_code" class="form-label">Class Code</label>
                    <input type="text" class="form-control" name="class_code" id="class_code" placeholder="IT0239" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Join</button>
            </div>
        </form>
    </div>
  </div>
</div>



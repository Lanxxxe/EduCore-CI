<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold px-4 py-3 ">Hello! <span class="text-primary">Student <?= esc($student['firstname'] . ' ' . $student['lastname'] ) ?></span></p>
        <p class="text-secondary">Student / <?= esc($page) ?></p>
    </div>

    <p class="fs-5 fw-bold ps-3 mt-4">Dashboard</p>

    <div class="p-3 shadow-sm mt-3">
        <!-- Stats Row -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stat-card primary">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($class_count) ?></h5>
                        <p class="card-text text-muted">Enrolled Classes</p>
                        <i class="bi bi-book fs-4 text-primary opacity-25 position-absolute bottom-0 end-0 me-3 mb-3"></i>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <!-- Classes Preview -->
    <p class="fs-5 fw-bold text-muted ps-3 mt-4">Enrolled Classes</p>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4 p-3 shadow-sm">
        <?php if (!empty($classes)): ?>
            <?php foreach ($classes as $class): ?>
                <div class="col">
                    <div class="card course-card">
                        <div class="card-img-top position-relative" style="height: 100px; background-color: #3262a8;">
                            <span class="badge bg-success">In Progress</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($class['title']) ?></h5>
                            <p class="card-text"><?= esc($class['description']) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    Prof. <?= esc($class['firstname'] . ' ' . $class['lastname']) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center mt-4">
                <p class="text-muted">You are not enrolled in any classes yet.</p>
            </div>
        <?php endif; ?>
    </div>
</div>



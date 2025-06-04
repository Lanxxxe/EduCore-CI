<?php
if ($gpa === 'N/A') {
    $gpaBadge = '<span class="badge bg-secondary">No Grades</span>';
} elseif ($gpa >= 90) {
    $gpaBadge = '<span class="badge bg-success">Excellent</span>';
} elseif ($gpa >= 85) {
    $gpaBadge = '<span class="badge bg-primary">Very Good</span>';
} elseif ($gpa >= 80) {
    $gpaBadge = '<span class="badge bg-info text-dark">Good</span>';
} elseif ($gpa >= 75) {
    $gpaBadge = '<span class="badge bg-warning text-dark">Satisfactory</span>';
} else {
    $gpaBadge = '<span class="badge bg-danger">Needs Improvement</span>';
}
?>

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
                            <h2 class="me-2"><?= esc($gpa) ?>%</h2>
                            <?= $gpaBadge ?>
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
                                <th>Midterm</th>
                                <th>Finals</th>
                                <th>GWA</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($grades)): ?>
                                <?php foreach ($grades as $grade): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold"><?= esc($grade['course_title']) ?></div>
                                            <small class="text-muted"><?= esc($grade['course_description']) ?></small>
                                        </td>
                                        <td><?= esc($grade['midterm'] ?? 'N/A') ?></td>
                                        <td><?= esc($grade['finals'] ?? 'N/A') ?></td>
                                        <td><?= esc($grade['gwa'] ?? 'N/A') ?>%</td>
                                        <td>
                                            <?php
                                                $midterm = $grade['midterm'] ?? null;
                                                $finals = $grade['finals'] ?? null;
                                                if (is_numeric($midterm) && is_numeric($finals)) {
                                                    echo '<span class="badge bg-success">Completed</span>';
                                                } else {
                                                    echo '<span class="badge bg-secondary">In Progress</span>';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">No grades found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>



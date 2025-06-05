<div class="main p-3">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold py-3">Hello Teacher <span class="text-primary"><?= esc($faculty['firstname']) ?></span> </p>
        <a href="<?= base_url('faculty/class')  ?>" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
    <div class="card my-4 mx-auto w-75">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><?= esc($activity['title']) ?> (<?= esc(ucfirst($activity['activity_type'])) ?>)</h5>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> <?= esc($activity['description']) ?></p>
            <p>
                <strong>Deadline:</strong>
                <?php
                    if (empty($activity['deadline']) || $activity['deadline'] === '0000-00-00 00:00:00') {
                        echo 'No Due Date';
                    } else {
                        echo esc(date('F j, Y', strtotime($activity['deadline'])));
                    }
                ?>
            </p>
            <p><strong>Max Score:</strong> <?= esc($activity['max_score']) ?></p>
        </div>
    </div>

    <div class="card mx-auto w-75">
        <div class="card-header bg-white">
            <h5 class="mb-0">Student Submissions</h5>
        </div>
        <div class="card-body">
            <?php if (!empty($students)): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Student ID</th>
                                <th>Submission Date</th>
                                <th>Remarks</th>
                                <th>Score</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $row): ?>
                                <tr>
                                    <td><?= esc($row['student']['firstname'] . ' ' . $row['student']['lastname']) ?></td>
                                    <td><?= esc($row['student']['student_id']) ?></td>
                                    <td><?= esc($row['submission']['submission_date']) ?></td>
                                    <td><?= esc($row['submission']['remarks']) ?></td>
                                    <td><?= esc($row['submission']['score'] ?? '-') ?></td>
                                    <td>
                                        <?php if (!empty($row['submission']['filepath'])): ?>
                                            <a href="<?= base_url($row['submission']['filepath']) ?>" target="_blank" class="btn btn-link btn-sm">
                                                View File
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">No File</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info mb-0">No student submissions yet.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
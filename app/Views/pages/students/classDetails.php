<?php
function activityBadge($type) {
    switch (strtolower($type)) {
        case 'material':
            return '<span class="badge bg-primary">Material</span>';
        case 'assessment':
            return '<span class="badge bg-warning text-dark">Assessment</span>';
        case 'quiz':
            return '<span class="badge bg-success">Quiz</span>';
        default:
            return '<span class="badge bg-secondary">'.esc($type).'</span>';
    }
}
?>

<div class="main p-3">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold px-4 py-3 ">Hello! <span class="text-primary"><?= esc($student['firstname'] . ' ' . $student['lastname'] ) ?></span></p>
        <p class="text-secondary">Student / <?= esc($page) ?></p>
    </div>

    <div class="d-flex align-items-center justify-content-between px-3 mt-5">
        <h3 class="fs-5 fw-bold ps-3 mt-4"><?= esc($class['title']) ?> (<?= esc($class['course_code']) ?>)</h3>
        <a href="<?= site_url('student/class') ?>" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
    </div>


    <div class="card mb-4 p-3 mt-3 mx-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Activities & Materials</h5>
        </div>
        <div class="card-body">
            <?php if (!empty($activities)): ?>
                <ul class="list-group">
                    <?php foreach ($activities as $activity): 
                        $submission = $submissionMap[$activity['id']] ?? null;
                    ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong><?= esc($activity['title']) ?></strong>
                                <?= activityBadge($activity['activity_type']) ?>
                                <?php if ($submission): ?>
                                    <span class="badge bg-success ms-2">Submitted</span>
                                <?php endif; ?>
                                <div><?= esc($activity['description']) ?></div>
                                <small class="text-muted">
                                    Deadline:
                                    <?php
                                        if (
                                            empty($activity['deadline']) ||
                                            $activity['deadline'] === '0000-00-00 00:00:00'
                                        ) {
                                            echo 'No Due Date';
                                        } else {
                                            echo esc(date('F j, Y', strtotime($activity['deadline'])));
                                        }
                                    ?>
                                </small>
                                <?php if ($submission && !empty($submission['filepath'])): ?>
                                    <div class="mt-2">
                                        <a href="<?= base_url($submission['filepath']) ?>" target="_blank" class="btn btn-link btn-sm">
                                            View Submitted File
                                        </a>
                                        <?php if (!empty($submission['original_filename'])): ?>
                                            <span class="text-muted">(<?= esc($submission['original_filename']) ?>)</span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <button
                                class="btn btn-outline-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#viewActivityModal"
                                data-activity='<?= json_encode($activity) ?>'
                                <?php if ($submission): ?>disabled<?php endif; ?>
                            >
                                View
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="alert alert-info mb-0">No activities or materials for this class yet.</div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Add more sections for tasks, assessments, etc. as needed -->
</div>


<div class="modal fade" id="viewActivityModal" tabindex="-1" aria-labelledby="viewActivityModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="activitySubmitForm" action="<?= site_url('student/activity/submit') ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="activity_id" id="modalActivityId">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="viewActivityModalLabel">Activity Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4 id="modalActivityTitle"></h4>
          <div id="modalActivityBadge"></div>
          <p class="mt-2" id="modalActivityDescription"></p>
          <p>
            <strong>Deadline:</strong>
            <span id="modalActivityDeadline"></span>
          </p>
          <div id="modalActivitySubmission" style="display:none;">
            <hr>
            <h5>Submit Your Work</h5>
            <div class="mb-3">
              <label for="activityFile" class="form-label">Upload File</label>
              <input type="file" class="form-control" id="activityFile" name="activity_file" required>
            </div>
            <div class="mb-3">
              <label for="activityRemarks" class="form-label">Remarks (optional)</label>
              <textarea class="form-control" id="activityRemarks" name="remarks" rows="2"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="modalSubmitBtn" class="btn btn-primary" style="display:none;">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
    var viewActivityModal = document.getElementById('viewActivityModal');
    viewActivityModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var activity = JSON.parse(button.getAttribute('data-activity'));

        // Fill modal fields
        document.getElementById('modalActivityId').value = activity.id || '';
        document.getElementById('modalActivityTitle').textContent = activity.title || '';
        document.getElementById('modalActivityBadge').innerHTML = <?= json_encode(activityBadge('TYPE_PLACEHOLDER')) ?>.replace('TYPE_PLACEHOLDER', activity.activity_type || '');
        document.getElementById('modalActivityDescription').textContent = activity.description || '';
        document.getElementById('modalActivityDeadline').textContent =
            (!activity.deadline || activity.deadline === '0000-00-00 00:00:00')
                ? 'No Due Date'
                : (new Date(activity.deadline)).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

        // Show/hide submission form
        var isMaterial = (activity.activity_type && activity.activity_type.toLowerCase() === 'material');
        document.getElementById('modalActivitySubmission').style.display = isMaterial ? 'none' : '';
        document.getElementById('modalSubmitBtn').style.display = isMaterial ? 'none' : '';
    });
</script>
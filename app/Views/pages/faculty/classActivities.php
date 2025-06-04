<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold py-3"><span class=""><?= esc($current_class['title']) ?></span> </p>
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addActivityModal">
            <i class="bi bi-plus"></i> Add Material
        </button>    
    </div>

    
    <?php if (!empty($activities)): ?>
        <?php foreach ($activities as $activity): ?>
            <div class="card text-center my-4 w-75 mx-auto">
                <div class="card-header bg-info text-white fw-bold">
                    <?= esc($activity['activity_type']) ?>
                </div>
                <div class="card-body">
                    <h4 class="card-title fw-bold"><?= esc($activity['title']) ?></h4>
                    <p class="card-text"><?= esc($activity['description']) ?></p>
                    <p class="card-text text-muted">
                        Deadline: <?= ($activity['deadline'] === '0000-00-00 00:00:00' || empty($activity['deadline']))
                        ? 'No Due Date'
                        : esc(date('F j, Y', strtotime($activity['deadline']))) ?><br>
                        Max Score: <?= esc($activity['max_score']) ?>
                    </p>
                    <a href="#" class="btn btn-primary">View Activity</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <!-- <p class="text-muted text-center">No activities available for this class.</p> -->
         <div class="w-50 mx-auto my-5">
              <div class="alert alert-info text-center" role="alert">
                  <i class="bi bi-info-circle-fill"></i> No activities available for this class..
              </div>
          </div>
    <?php endif; ?>
</div>

<!-- Add Materials Modal -->
<div class="modal fade" id="addActivityModal" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('faculty/class/activities/create') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="addActivityModalLabel">Add New Activity</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Activity Type -->
          <div class="mb-3">
            <label for="activity_type" class="form-label">Material Type</label>
            <select name="activity_type" id="activity_type" class="form-select" required>
              <option value="" disabled selected>Select type</option>
              <option value="Activity">Activity</option>
              <option value="Assessment">Assessment</option>
              <option value="Material">Material</option>
            </select>
          </div>

          <!-- Title -->
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
          </div>

          <!-- Deadline -->
          <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="form-control">
          </div>

          <!-- Max Score -->
          <div class="mb-3">
            <label for="max_score" class="form-label">Max Score</label>
            <input type="number" name="max_score" id="max_score" class="form-control" min="1" >
          </div>

          <!-- Hidden Class ID -->
          <input type="hidden" name="class_id" value="<?= esc((int) $current_class['id']) ?> ">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-floppy"></i> Save Activity</button>
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

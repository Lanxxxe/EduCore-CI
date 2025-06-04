<div class="main p-3 ">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header row align-items-center bg-white">
                    <div class="col-auto">
                        <img src="https://ui-avatars.com/api/?name=<?= esc($faculty['firstname']) ?>+<?= esc($faculty['lastname']) ?>&background=224b82&color=fff&size=200" alt="Profile Picture" class="profile-img">
                    </div>
                    <div class="col">
                        <h2 class="mb-1">Prof. <?= esc($faculty['firstname'] . ' ' . $faculty['lastname']) ?></h2>
                    </div>
                    <div class="col-md-auto mt-3 mt-md-0">
                        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="bi bi-pencil me-1"></i> Edit Profile
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Full Name</label>
                                <p class="mb-0 fw-medium">Prof. <?= esc($faculty['firstname'] . ' ' . $faculty['lastname']) ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Department</label>
                                <p class="mb-0 fw-medium"><?= esc($faculty['department']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Email Address</label>
                                <p class="mb-0 fw-medium"><?= esc($faculty['email']) ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Phone Number</label>
                                <p class="mb-0 fw-medium"><?= esc($faculty['contact_number']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Position</label>
                                <p class="mb-0 fw-medium"><?= esc($faculty['role']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= site_url('faculty/profile/update') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= esc($faculty['id']) ?>">
          <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= esc($faculty['firstname']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= esc($faculty['lastname']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="middlename" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middlename" name="middlename" value="<?= esc($faculty['middlename']) ?>">
          </div>
          <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" name="department" value="<?= esc($faculty['department']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($faculty['email']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="contact_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?= esc($faculty['contact_number']) ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </form>
  </div>
</div>

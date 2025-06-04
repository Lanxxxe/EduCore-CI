<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold px-4 py-3 ">Hello! <span class="text-primary">Student</span></p>
        <p class="text-secondary">Student / <?= esc($page) ?></p>
    </div>

    <p class="fs-5 fw-bold ps-3 mt-4">Profile</p>

    <div class=" p-3 shadow-sm mt-3">
        <!-- Profile Header -->
        <div class="profile-header mb-4">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="https://ui-avatars.com/api/?name=<?= esc($student['firstname']) ?>+<?= esc($student['lastname']) ?>&background=224b82&color=fff&size=200" alt="Profile Picture" class="profile-img">                        </div>
                        <div class="col">
                            <h2 class="mb-1"><?= esc($student['firstname'] . ' ' . $student['lastname']) ?></h2>
                            <p class="mb-0"><?= esc($student['program']) ?></p>
                            <p class="mb-0">Student ID: <?= esc($account['student_id']) ?></p>

                        </div>
                        <div class="col-md-auto mt-3 mt-md-0">
                            <button class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                <i class="bi bi-pencil me-1"></i> Edit Profile
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Main Profile Info -->
                    <div class="col-lg-8 mb-4">
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Personal Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Full Name</label>
                                            <p class="mb-0 fw-medium"><?= esc($student['firstname'] . ' ' . $student['middlename'] . ' ' . $student['lastname']) ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Date of Birth</label>
                                            <p class="mb-0 fw-medium"><?= date('F j, Y', strtotime($student['birthday'])) ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Email Address</label>
                                            <p class="mb-0 fw-medium"><?= esc($account['email']) ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Phone Number</label>
                                            <p class="mb-0 fw-medium">(+63) 928 298 0239 </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Info -->
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Academic Summary</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span>Current GPA</span>
                                    <span class="badge bg-success"><?= esc($gpa) ?>%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= site_url('student/profile/update') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= esc($student['id']) ?>">
          <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= esc($student['firstname']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="middlename" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middlename" name="middlename" value="<?= esc($student['middlename']) ?>">
          </div>
          <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= esc($student['lastname']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="birthday" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= esc($student['birthday']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($account['email']) ?>" required>
          </div>
          <!-- Add more fields as needed -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </form>
  </div>

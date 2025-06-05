<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Student Account</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Maintenance</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Student Information</h3>
                        </div>
                        <?php if (!empty($account) && !empty($info)): ?>
                        <form action="<?= base_url('admin/editStudentAccount/' . esc($account['id'])) ?>" method="post">
                            <input type="hidden" name="student_id" value="<?= esc($account['student_id']) ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control form-control-sm" id="firstname" name="firstname" value="<?= esc($info['firstname']) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" class="form-control form-control-sm" id="middlename" name="middlename" value="<?= esc($info['middlename']) ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control form-control-sm" id="lastname" name="lastname" value="<?= esc($info['lastname']) ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="program">Program</label>
                                            <input type="text" class="form-control form-control-sm" id="program" name="program" value="<?= esc($info['program']) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birthday">Birthday</label>
                                            <input type="date" class="form-control form-control-sm" id="birthday" name="birthday" value="<?= esc($info['birthday']) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="number" class="form-control form-control-sm" id="age" name="age" value="<?= esc($info['age']) ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?= esc($account['email']) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password (Leave blank to keep current password)</label>
                                            <input type="password" class="form-control form-control-sm" id="password" name="password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                <a href="<?= base_url('admin/students') ?>" class="btn btn-default btn-sm">Cancel</a>
                            </div>
                        </form>
                        <?php else: ?>
                            <div class="card shadow-sm mt-4">
                                <div class="card-body text-center py-5">
                                    <i class="bi bi-exclamation-circle text-warning" style="font-size: 4rem;"></i>
                                    <h4 class="mt-3">No student account found!</h4>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
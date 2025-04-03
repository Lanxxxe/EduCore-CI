<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>


<!-- Your main app body -->
<main class="app-main">
    <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">School Personnels</h3>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Maintenance</a></li>
                    <li class="breadcrumb-item active" aria-current="page">School Personnels</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
    </div>

    <!-- Your App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Personnel Information</h3>
                        </div>
                        <?php if (!empty($accounts_list  )): ?>
                        <!-- /.card-header -->
                        <form action="<?= base_url('admin/editAccount/' . esc($accounts_list['id'])) ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $accounts_list['id']; ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control form-control-sm" id="firstname" name="firstname" value="<?php echo $accounts_list['firstname']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" class="form-control form-control-sm" id="middlename" name="middlename" value="<?php echo $accounts_list['middlename']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control form-control-sm" id="lastname" name="lastname" value="<?php echo $accounts_list['lastname']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $accounts_list['email']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password (Leave blank to keep current password)</label>
                                            <input type="password" class="form-control form-control-sm" id="password" name="password">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select class="form-control form-control-sm" id="role" name="role" required>
                                                <option value="Administrator" <?php echo ($accounts_list['role'] == 'Administrator') ? 'selected' : ''; ?>>Administrator</option>
                                                <option value="Faculty" <?php echo ($accounts_list['role'] == 'Faculty') ? 'selected' : ''; ?>>Faculty</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <input type="text" class="form-control form-control-sm" id="department" name="department" value="<?php echo $accounts_list['department']; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" class="form-control form-control-sm" id="contact_number" name="contact_number" value="<?php echo $accounts_list['contact_number']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                <a href="<?= base_url('admin/accounts') ?>" class="btn btn-default btn-sm">Cancel</a>
                            </div>
                        </form>
                        <?php else: ?>
                            <div class="card shadow-sm mt-4">
                                <div class="card-body text-center py-5">
                                    <i class="bi bi-exclamation-circle text-warning" style="font-size: 4rem;"></i>
                                    <h4 class="mt-3">No account found!</h4>
                                </div>
                            </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</main>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"><?= esc($title) ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Maintenance</a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
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
                            <h3 class="card-title">Personnel Information</h3>
                        </div>
                        <form action="<?= base_url('admin/createAccount') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control form-control-sm" id="firstname" name="firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" class="form-control form-control-sm" id="middlename" name="middlename">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control form-control-sm" id="lastname" name="lastname" required>
                                        </div>
                                    </div>
                                </div>             
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                                        </div>
                                    </div>
                                </div>                
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select class="form-control form-control-sm" id="role" name="role" required>
                                                <option value="">Select Role</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Faculty">Faculty</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <input type="text" class="form-control form-control-sm" id="department" name="department">
                                        </div>
                                    </div>
                                </div>        
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" class="form-control form-control-sm" id="contact_number" name="contact_number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <a href="<?= base_url('admin/accounts') ?>" class="btn btn-default btn-sm">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
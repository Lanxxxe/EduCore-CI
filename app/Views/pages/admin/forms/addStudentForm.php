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
                <h3 class="mb-0"><?= esc($title) ?></h3>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Maintenance</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Account</li>
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
                            <h3 class="card-title">Students Account</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="<?= base_url('admin/createAccount') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="studentID">Student ID</label>
                                            <input type="text" class="form-control form-control-sm" id="studentID" name="studentID" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="program">Program</label>
                                            <select class="form-select form-select-sm" aria-label="Small select example">
                                                <option selected>Select a Program</option>
                                                <option value="1">BSIT</option>
                                                <option value="2">Education</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mt-4 text-secondary">Personal Information</h5>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control form-control-sm" id="firstname" name="firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" class="form-control form-control-sm" id="middlename" name="middlename" required>
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

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Birthday</label>
                                            <input type="datetime" class="form-control form-control-sm" id="email" name="email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Age</label>
                                            <input type="number" class="form-control form-control-sm" id="email" name="email" required>
                                        </div>
                                    </div>

                                </div>
                                
                                <h5 class="mt-4 text-secondary">Student Account</h5>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <a href="<?= base_url('admin/students') ?>" class="btn btn-default btn-sm">Cancel</a>
                            </div>
                        </form>
                    </div>
                <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</main>




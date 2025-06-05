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
                        <form action="<?= base_url('admin/createStudentAccount') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="student_id">Student ID<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm" id="student_id" name="student_id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="program">Program<span class="text-danger">*</span></label>
                                            <select class="form-select form-select-sm" name="program" aria-label="Select program" required>
                                                <option selected disabled>Select a Program</option>
                                                <option value="BSIT">Bachelor of Science in Information Technology (BSIT)</option>
                                                <option value="BSCS">Bachelor of Science in Computer Science (BSCS)</option>
                                                <option value="BSBA">Bachelor of Science in Business Administration (BSBA)</option>
                                                <option value="BSA">Bachelor of Science in Accountancy (BSA)</option>
                                                <option value="BSN">Bachelor of Science in Nursing (BSN)</option>
                                                <option value="BSEd">Bachelor of Secondary Education (BSEd)</option>
                                                <option value="BEEd">Bachelor of Elementary Education (BEEd)</option>
                                                <option value="BAComm">Bachelor of Arts in Communication (BA Comm)</option>
                                                <option value="BAEng">Bachelor of Arts in English (BA English)</option>
                                                <option value="BAPsych">Bachelor of Arts in Psychology (BA Psychology)</option>
                                                <option value="BSPsych">Bachelor of Science in Psychology (BS Psychology)</option>
                                                <option value="BSE">Bachelor of Science in Engineering (BSE)</option>
                                                <option value="BSMath">Bachelor of Science in Mathematics (BS Math)</option>
                                                <option value="BSSocial">Bachelor of Science in Social Work (BS Social Work)</option>
                                                <option value="BSAgriculture">Bachelor of Science in Agriculture (BS Agriculture)</option>
                                                <option value="BSEnvironmental">Bachelor of Science in Environmental Science (BS Environmental Science)</option>
                                                <option value="Education">Bachelor of Education</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mt-4 text-secondary">Personal Information</h5>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">First Name<span class="text-danger">*</span></label>
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
                                            <label for="lastname">Last Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm" id="lastname" name="lastname" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birthday">Birthday<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control form-control-sm" id="birthday" name="birthday" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="age">Age<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control form-control-sm" id="age" name="age" required>
                                        </div>
                                    </div>

                                </div>
                                
                                <h5 class="mt-4 text-secondary">Student Account</h5>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Password<span class="text-danger">*</span></label>
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




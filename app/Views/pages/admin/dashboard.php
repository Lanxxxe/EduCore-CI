
    <!-- Your main app body -->
    <main class="app-main">
        <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Hello! Administrator</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                    <div class="col-lg-3 col-6">
                        <div class="small-box text-bg-primary">
                            <div class="inner d-flex align-items-start justify-content-between">
                                <div>
                                    <h3><?= esc($registered_student) ?></h3>
                                    <p>Student</p>
                                </div>
                                <i class="bi bi-mortarboard" style="font-size: 50px;"></i>
                            </div>
                            <a href="<?= base_url('admin/accounts') ?>" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                View Student Accounts <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 1-->
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box text-bg-success">
                            <div class="inner d-flex align-items-center justify-content-between">
                                <div>
                                    <h3><?= esc($registered_personnel) ?></h3>
                                    <p>Faculty</p>
                                </div>
                                <i class="bi bi-people" style="font-size: 50px;"></i>
                            </div>
                            <a href="<?= base_url('admin/students') ?>" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover" >
                                View Faculty Accounts <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 2-->
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box text-bg-warning">
                            <div class="inner d-flex align-items-center justify-content-between">
                                <div>
                                    <h3>0</h3>
                                    <p>Classes</p>
                                </div>
                                <i class="bi bi-bar-chart" style="font-size: 50px;"></i>
                            </div>
                            <a href="#" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover" >
                                View Classes <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

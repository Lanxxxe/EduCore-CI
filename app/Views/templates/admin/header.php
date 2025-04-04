<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edu Core | <?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Edu Core" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables & Plugins -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>


</head>

    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        <div class="app-wrapper">

        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                    </a>
                </li>
                </ul>

            </div>
            <!--end::Container-->
        </nav>

        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="./index.html" class="brand-link">
                <span class="brand-text fw-light">Administrator</span>
                </a>
            </div>
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                <!--begin::Sidebar Menu-->
                <ul
                    class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="menu"
                    data-accordion="false"
                >

                    <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard')  ?>" class="nav-link">
                        <i class="nav-icon bi bi-graph-up"></i>
                        <p>Dashboard</p>
                    </a>
                    </li> 

                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-tools"></i>
                        <p>
                        Maintenance
                        <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="<?= base_url('admin/accounts') ?>" class="nav-link">
                            <i class="nav-icon bi bi-people"></i>
                            <p>Personnels</p>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?= base_url('admin/students')  ?>" class="nav-link">
                            <i class="nav-icon bi bi-mortarboard"></i>
                            <p>Students</p>
                        </a>
                        </li>
                    </ul>
                    </li>
                    
                    <!-- <li class="nav-item">
                    <a href="./generate/theme.html" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Order List</p>
                    </a>
                    </li>  -->
                </ul>
                <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->

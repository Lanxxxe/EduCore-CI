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
                        <h3 class="card-title">List</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('admin/createAccount') ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus"></i> Add New Personnel
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="personnelTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Department</th>
                                    <th>Contact Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($account_list !== []): ?>
                                    <?php foreach ($account_list as $person): ?>
                                        <tr>                                            <td><?= esc($person['lastname']) . ', ' . $person['firstname'] . ' ' . $person['middlename']; ?></td>
                                            <td><?= esc($person['email']); ?></td>
                                            <td><?= esc($person['role']); ?></td>
                                            <td><?= esc($person['school_id']); ?></td>
                                            <td><?= esc($person['contact_number']); ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/editAccount/') . esc($person['id']) ?>" class="btn btn-info btn-sm">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="<?= esc($person['id']); ?>">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No personnel found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
        </div>
    </div>
</main>

<script>
    $(function () {
            $("#personnelTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "order": [[1, 'asc']]
            });
            
            // Delete confirmation
            $('.delete-btn').on('click', function() {
                const id = $(this).data('id');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?= base_url('admin/deleteAccount/') ?>" + id;
                    }
                });
            });
        });
</script>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>
<div class="main p-3">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold py-3">Hello Teacher <span class="text-primary">John Doe</span></p>
        <a href="<?= base_url('faculty/class')  ?>" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    <p class="fs-5 fw-bold ps-3 mt-4"><?= esc($title) ?></p>
    <div class="container mt-4">
        <div class="card shadow" style="min-width:600px">
            <div class="card-body">
                <form action="<?= site_url('faculty/classes/add') ?>" method="post">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="class_code" class="form-label">Class Code:</label>
                            <input type="text" id="class_code" name="class_code" class="form-control" required>
                        </div>
                        <div class="col mb-3">
                            <label for="class_name" class="form-label">Class Name:</label>
                            <input type="text" id="class_name" name="class_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary">Add Class</button>
                        <!-- <a href="<?= base_url('faculty/class') ?>" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left"></i> Back</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
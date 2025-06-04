<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold py-3 ">Hello Teacher <span class="text-primary"><?= esc($faculty['firstname']) ?></span></p>
        <a href="" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Add Class</a>
    </div>

    <!-- Student List -->
    <div class="card mt-3 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="">All Students</h5>
            <!-- <div>
                <button class="btn btn-sm btn-outline-primary me-2">
                    <i class="bi bi-envelope me-1"></i> Email Selected
                </button>
                <button class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-download me-1"></i> Export
                </button>
            </div> -->
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>ID</th>
                            <th>Classes</th>
                            <th>Email</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($students !== []): 
                            foreach($students as $student): ?>    
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=<?= esc($student['student_firstname'] . ' ' . $student['student_lastname']) ?>&background=3262a8&color=fff" class="rounded-circle me-2" width="40" height="40" alt="Student">
                                            <div>
                                                <div class="fw-medium"><?= esc($student['student_firstname'] . ' ' . $student['student_lastname']) ?><div>
                                                <!-- <small class="text-muted"><?= esc($student['student_email']) ?></small> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= esc($student['student_code']) ?></td>
                                    <td>
                                        <span class="badge bg-primary me-1"><?= esc($student['title']) ?></span>
                                    </td>
                                    <td>
                                        <?= esc($student['student_email']) ?>
                                    </td>
                                    <!-- <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#studentDetailsModal"><i class="bi bi-info-circle me-2"></i>View Details</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-envelope me-2"></i>Send Message</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-text me-2"></i>View Grades</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-plus me-2"></i>Add Note</a></li>
                                            </ul>
                                        </div>
                                    </td> -->
                                </tr>
                                    
                        <?php 
                        endforeach; 
                            else: ?>
                                <div class="col-12">
                                    <div class="alert alert-info text-center" role="alert">
                                        <i class="bi bi-info-circle-fill"></i> No active classes found.
                                    </div>
                                </div>
                            <?php
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="card-footer bg-white">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div> -->
    </div>

</div>



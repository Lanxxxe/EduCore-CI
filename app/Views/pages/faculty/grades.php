<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold py-3 ">Hello Teacher <span class="text-primary"><?= esc($faculty['firstname']) ?></span></p>
    </div>
    <p class="fs-5 fw-bold ps-3 mt-4">Grades</p>
    <!-- Class Selection -->
    <div class="card mb-4 p-3 shadow-sm mt-3 gap-3">
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <form action="<?= site_url('faculty/grades') ?>" method="get">
                        <label for="classSelect" class="form-label">Select Class</label>
                        <div class="d-flex align-items-center gap-3">
                            <select class="form-select" name="class_id" id="classSelect">
                                <option disabled selected>-- Select Class --</option>
                                <?php foreach ($classes as $class): ?>
                                    <option value="<?= esc($class['id']) ?>" <?= (isset($_GET['class_id']) && $_GET['class_id'] == $class['id']) ? 'selected' : '' ?>>
                                        <?= esc($class['title']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm w-25"><i class="bi bi-funnel"></i> Filter</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>


    <!-- Grades Table -->
    <div class="card p-3 shadow-sm mt-3 gap-3">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Student Grades 
                <?= !empty($class_id) && !empty($current_class['title']) ? esc(' - ' . $current_class['title']) : '' ?>
            </h5>

        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>ID</th>
                            <th>Midterm Grade</th>
                            <th>Finals Grade</th>
                            <th>Overall Average</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($students)): ?>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($student['name']) ?>&background=3262a8&color=fff"
                                                class="rounded-circle me-2" width="32" height="32" alt="Student">
                                            <div><?= esc($student['name']) ?></div>
                                        </div>
                                    </td>
                                    <td><?= esc($student['student_id']) ?></td>
                                    <td><?= esc($student['midterm'] ?? 'N/A') ?></td>
                                    <td><?= esc($student['final'] ?? 'N/A') ?></td>
                                    <td><?= esc($student['average']) ?>%</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editGradeModal"
                                                data-student-id="<?= esc($student['student_id']) ?>"
                                                data-student-name="<?= esc($student['name']) ?>"
                                                data-midterm="<?= esc($student['midterm']) ?>"
                                                data-final="<?= esc($student['final']) ?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td class="text-center" colspan="6">No students found for this class.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<div class="modal fade" id="editGradeModal" tabindex="-1" aria-labelledby="editGradeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= site_url('faculty/class/update-grade') ?>" method="post">
            <input type="hidden" name="student_id" id="modalStudentId">
            <input type="hidden" name="class_id" value="<?= esc($class_id) ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGradeModalLabel">Edit Grades</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="studentNameLabel"></p>
                    <div class="mb-3">
                        <label for="midtermGrade" class="form-label">Midterm Grade</label>
                        <input type="number" class="form-control" id="midtermGrade" name="midterm" min="0" max="100">
                    </div>
                    <div class="mb-3">
                        <label for="finalGrade" class="form-label">Final Grade</label>
                        <input type="number" class="form-control" id="finalGrade" name="final" min="0" max="100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Grades</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var editGradeModal = document.getElementById('editGradeModal');
    editGradeModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        document.getElementById('modalStudentId').value = button.getAttribute('data-student-id');
        document.getElementById('studentNameLabel').textContent = button.getAttribute('data-student-name');
        document.getElementById('midtermGrade').value = button.getAttribute('data-midterm') || '';
        document.getElementById('finalGrade').value = button.getAttribute('data-final') || '';
    });
</script>

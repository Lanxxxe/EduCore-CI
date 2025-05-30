<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold py-3 ">Hello Teacher <span class="text-primary">John Doe</span></p>
        <a href="" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Add Class</a>
    </div>
    <p class="fs-5 fw-bold ps-3 mt-4">Grades</p>
    <!-- Class Selection -->
    <div class="card mb-4 p-3 shadow-sm mt-3 gap-3">
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label for="classSelect" class="form-label">Select Class</label>
                    <select class="form-select" id="classSelect">
                        <option selected>Math 101 - Advanced Mathematics</option>
                        <option>Science 202 - Physical Sciences</option>
                        <option>History 202 - World History</option>
                    </select>
                </div>
                <!-- <div class="col-md-4">
                    <label for="assignmentSelect" class="form-label">Select Assignment</label>
                    <select class="form-select" id="assignmentSelect">
                        <option selected value="">All Assignments</option>
                        <option>Problem Set #1</option>
                        <option>Quiz #1</option>
                        <option>Problem Set #2</option>
                        <option>Quiz #2</option>
                        <option>Problem Set #3</option>
                        <option>Mini Project</option>
                        <option>Problem Set #4</option>
                        <option>Problem Set #5</option>
                        <option>Midterm Exam</option>
                    </select>
                </div> -->
                <!-- <div class="col-md-4">
                    <label for="statusSelect" class="form-label">Status</label>
                    <select class="form-select" id="statusSelect">
                        <option selected value="">All Status</option>
                        <option>Graded</option>
                        <option>Pending</option>
                        <option>Not Submitted</option>
                    </select>
                </div> -->
            </div>
        </div>
    </div>


    <!-- Grades Table -->
    <div class="card p-3 shadow-sm mt-3 gap-3">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Student Grades</h5>
            <!-- <div>
                <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#importGradesModal">
                    <i class="bi bi-upload me-1"></i> Import
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
                            <th>Problem Set #1</th>
                            <th>Quiz #1</th>
                            <th>Problem Set #2</th>
                            <th>Quiz #2</th>
                            <th>Problem Set #3</th>
                            <th>Mini Project</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=John+Student&background=3262a8&color=fff" class="rounded-circle me-2" width="32" height="32" alt="Student">
                                    <div>John Student</div>
                                </div>
                            </td>
                            <td>20215678</td>
                            <td>92/100</td>
                            <td>85/100</td>
                            <td>88/100</td>
                            <td>90/100</td>
                            <td>95/100</td>
                            <td>95/100</td>
                            
                            <td>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Sarah+Jones&background=28a745&color=fff" class="rounded-circle me-2" width="32" height="32" alt="Student">
                                    <div>Sarah Jones</div>
                                </div>
                            </td>
                            <td>20215432</td>
                            <td>98/100</td>
                            <td>95/100</td>
                            <td>96/100</td>
                            <td>92/100</td>
                            <td>97/100</td>
                            <td>98/100</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Michael+Brown&background=dc3545&color=fff" class="rounded-circle me-2" width="32" height="32" alt="Student">
                                    <div>Michael Brown</div>
                                </div>
                            </td>
                            <td>20217890</td>
                            <td>85/100</td>
                            <td>78/100</td>
                            <td>82/100</td>
                            <td>80/100</td>
                            <td>88/100</td>
                            <td>90/100</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Emily+Davis&background=ffc107&color=fff" class="rounded-circle me-2" width="32" height="32" alt="Student">
                                    <div>Emily Davis</div>
                                </div>
                            </td>
                            <td>20213456</td>
                            <td>75/100</td>
                            <td>68/100</td>
                            <td>72/100</td>
                            <td>70/100</td>
                            <td>78/100</td>
                            <td>80/100</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=David+Wilson&background=6f42c1&color=fff" class="rounded-circle me-2" width="32" height="32" alt="Student">
                                    <div>David Wilson</div>
                                </div>
                            </td>
                            <td>20219876</td>
                            <td>82/100</td>
                            <td>80/100</td>
                            <td>85/100</td>
                            <td>78/100</td>
                            <td>84/100</td>
                            <td>88/100</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
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
        </div>
    </div>

</div>



<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold px-4 py-3 ">Hello! <span class="text-primary">Student</span></p>
        <p class="text-secondary">Student / <?= esc($page) ?></p>
    </div>

    <p class="fs-5 fw-bold ps-3 mt-4">Profile</p>

    <div class=" p-3 shadow-sm mt-3">
        <!-- Profile Header -->
        <div class="profile-header mb-4">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="https://ui-avatars.com/api/?name=John+Student&background=224b82&color=fff&size=200" alt="Profile Picture" class="profile-img">
                        </div>
                        <div class="col">
                            <h2 class="mb-1">John Student</h2>
                            <p class="mb-0">Computer Science • Junior Year</p>
                            <p class="mb-0">Student ID: 20215678</p>
                        </div>
                        <div class="col-md-auto mt-3 mt-md-0">
                            <button class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                <i class="bi bi-pencil me-1"></i> Edit Profile
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Main Profile Info -->
                    <div class="col-lg-8 mb-4">
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Personal Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Full Name</label>
                                            <p class="mb-0 fw-medium">John Alex Student</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Date of Birth</label>
                                            <p class="mb-0 fw-medium">June 15, 2002</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Email Address</label>
                                            <p class="mb-0 fw-medium">john.student@university.edu</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Phone Number</label>
                                            <p class="mb-0 fw-medium">(+63) 928 298 0239 </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Address</label>
                                            <p class="mb-0 fw-medium">23 Softball St. San Antonio, Paranaque City</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-0">
                                            <label class="form-label text-muted">Emergency Contact</label>
                                            <p class="mb-0 fw-medium">Mary Student (Parent) - (+63) 948 298 2192</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Academic Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Major</label>
                                            <p class="mb-0 fw-medium">Computer Science</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Minor</label>
                                            <p class="mb-0 fw-medium">Mathematics</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Academic Year</label>
                                            <p class="mb-0 fw-medium">Junior (3rd Year)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Enrollment Status</label>
                                            <p class="mb-0 fw-medium">Full-time</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Advisor</label>
                                            <p class="mb-0 fw-medium">Dr. Alan Turing</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-0">
                                            <label class="form-label text-muted">Expected Graduation</label>
                                            <p class="mb-0 fw-medium">May 2025</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Sidebar Info -->
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Academic Summary</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span>Current GPA</span>
                                    <span class="badge bg-primary">3.65</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span>CreditCompleted</span>
                                    <span class="badge bg-primary">67</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span>Current Credit</span>
                                    <span class="badge bg-primary">15</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span>Remaining Credit</span>
                                    <span class="badge bg-primary">38</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>



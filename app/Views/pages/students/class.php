<div class="main p-3 ">
    <div class="d-flex align-items-center justify-content-between shadow-sm px-3">
        <p class="fs-4 fw-bold px-4 py-3 ">Hello! <span class="text-primary">Student</span></p>
        <p class="text-secondary">Student / <?= esc($page) ?></p>
    </div>

    <p class="fs-5 fw-bold ps-3 mt-4">Classes</p>

    <div class="d-flex align-items-start justify-content-start p-3 shadow-sm mt-3 gap-3">
        
        <div class="card text-center container-fluid">
            <div class="card-header">
                <h1 class="text-success">Enroll Now</h1>
            </div>
            <div class="card-body">
                <i class="bi bi-exclamation text-warning d-block" style="font-size: 10rem;"></i>
                <h3 class="card-title">You don't have any enrolled subject</h3>
                <a class="card-text btn btn-success mt-3">Enroll now</a>
            </div>
        </div>
    </div>
</div>



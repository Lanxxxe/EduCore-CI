<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Administrator Login</title>


    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
</head>

<body>
    <div class="vh-100 d-flex align-items-center justify-content-center">
        <section class="container-fluid ">
            <div class="container vh-100 ">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow" style="border-radius: 1rem;">
                            <div class="card-body py-3 px-5">
                                <form action="<?= site_url('/admin') ?>" method="post" id="loginForm">
                                    <div class="mb-md-5 mt-md-4 pb-5">
                                        <div class="text-center">
                                            <!-- <i class="bi bi-mortarboard-fill text-primary" style="font-size: 3rem;"></i> -->
                                            <img class="mx-auto d-block" src="<?= base_url('assets/images/EduCoreLogo.png'); ?>" alt="Educore Logo">
                                            <h5 class="fw-bold mb-2 mt-2 text-uppercase">Learning Management System</h5>
                                            <h5 class="mb-2 text-muted">Administrator Login</h5>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4 mt-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-md" placeholder="ex.marie.faculty@evsu.edu.ph" />
                                        </div>
                                        <div data-mdb-input-init class="form-outline form-white mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-md" />
                                        </div>
    
                                        <p class="small mb-5 pb-lg-2"><a class="" href="#!">Forgot password?</a></p>
    
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-md w-100 px-5" type="submit">Login</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() { 
            <?php if(session()->getFlashdata('error')): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?= session()->getFlashdata('error'); ?>'
                });
            <?php endif; ?>
            
            <?php if(session()->getFlashdata('success')): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '<?= session()->getFlashdata('success'); ?>'
                });
            <?php endif; ?>
        });
    </script>
</body>
</html>
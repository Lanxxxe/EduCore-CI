        
        </div>
        

        <script>
            document.addEventListener('DOMContentLoaded', function() { 
                // Display SweetAlert messages
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
        
        <!-- AdminLTE -->
        <!-- <script src="../assets/adminlte/js/adminlte.js"></script> -->
        <script
        src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/js/adminlte.min.js"
        crossorigin="anonymous"
        ></script>

    </body>
</html>
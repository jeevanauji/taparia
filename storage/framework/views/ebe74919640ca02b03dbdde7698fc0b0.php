<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $__env->make('backend.layout.library', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <?php echo $__env->make('backend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php echo $__env->make('backend.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- /.content-wrapper -->
            <?php echo $__env->make('backend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo e(asset('backend/js/jquery.min.js')); ?>"></script>
        <!-- Bootstrap 4 -->
        <script type="text/javascript" src="<?php echo e(asset('backend/js/bootstrap.bundle.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/jquery.dataTables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/dataTables.bootstrap4.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/dataTables.responsive.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/responsive.bootstrap4.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/dataTables.buttons.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/buttons.bootstrap4.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/jszip.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/pdfmake.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/vfs_fonts.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/buttons.html5.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/buttons.print.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/buttons.colVis.min.js')); ?>"></script>
        <!-- Link to Select2 JavaScript -->
        <script type="text/javascript" src="<?php echo e(asset('backend/js/select2.full.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/summernote-bs4.min.js')); ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script type="text/javascript" src="<?php echo e(asset('backend/js/demo.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/adminlte.min.js')); ?>"></script>

        <script type="text/javascript">
            window.onload = function () {
                var alert = document.querySelector('.alert');
                if (alert) {
                    // Show the alert
                    alert.style.display = "block";

                    // Set timeout to hide the alert after 5 seconds (5000 milliseconds)
                    setTimeout(function () {
                        $(alert).alert('close');
                    }, 5000);
                }
            };
        </script>
        
        <?php echo $__env->yieldContent('javaScript'); ?>        
    </body>
</html>
<?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/backend/master.blade.php ENDPATH**/ ?>
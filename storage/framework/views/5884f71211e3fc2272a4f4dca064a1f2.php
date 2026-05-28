<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Taparia Tools | Log in</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('frontend/images/favicon.png')); ?>" />
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/all.min.css')); ?>" />
        <!-- icheck bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/icheck-bootstrap.min.css')); ?>" />
        <!-- Theme style -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/adminlte.min.css')); ?>" />
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Taparia</b>Tools</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <?php if(session('status')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('status')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php elseif(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>


                    <form action="<?php echo e(route('auth')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <?php if($errors->has('email')): ?>
                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <!-- /.col -->
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>

                    </form>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo e(asset('backend/js/jquery.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/bootstrap.bundle.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('backend/js/adminlte.min.js')); ?>"></script>
        <script type="text/javascript">
            window.onload = function () {
                var alert = document.querySelector('.alert');
                if (alert) {
                    // Show the alert
                    alert.style.display = "block";

                    // Set timeout to hide the alert after 5 seconds (5000 milliseconds)
                    setTimeout(function () {
                        $(alert).alert('close'); // Automatically close the alert
                    }, 2000); // 5 seconds
                }
            };
        </script>
    </body>
</html><?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/backend/login.blade.php ENDPATH**/ ?>
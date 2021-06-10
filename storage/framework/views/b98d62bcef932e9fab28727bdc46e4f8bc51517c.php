<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(url('adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(url('libs/ionicons/ionicons.min.css')); ?>">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo e(url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(url('adminlte/plugins/jqvmap/jqvmap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(url('adminlte/dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(url('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(url('adminlte/plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(url('adminlte/plugins/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('libs/dropzone/dropzone.min.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('libs/toastr/toastr.min.css')); ?>">
    <!-- Pace -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('libs/pace/flash.css')); ?>">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(url('libs/dataTables/jquery.dataTables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('libs/dataTables/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('libs/dataTables/fixedHeader.bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('libs/dataTables/responsive.bootstrap.min.css')); ?>">


</head>

<body style="background-color:#343a40">
    <br>
    <br>
    <br>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header" align="center" >Silakan ganti password anda jika memang diperlukan untuk melakukan perubahan</div>

                    <div class="card-body">

                        <form method="POST" action="<?php echo e(route('change.password')); ?>">

                            <?php echo csrf_field(); ?>

                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <p class="text-danger"><?php echo e($error); ?></p>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="form-group row">

                                <label for="password" class="col-md-4 col-form-label text-md-right">Password Lama</label>

                                <div class="col-md-6">

                                    <input id="password" type="password" class="form-control" name="current_password"
                                        autocomplete="current-password">

                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="password" class="col-md-4 col-form-label text-md-right">Password Baru</label>

                                <div class="col-md-6">

                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        autocomplete="current-password">

                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="password" class="col-md-4 col-form-label text-md-right">Konfirmasi Password Baru</label>

                                <div class="col-md-6">

                                    <input id="new_confirm_password" type="password" class="form-control"
                                        name="new_confirm_password" autocomplete="current-password">

                                </div>

                            </div>

                            <div class="form-group row mb-0">

                                <div class="col-md-8 offset-md-4">

                                    <button type="submit" class="btn btn-primary">

                                        Ganti Password

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\surat\resources\views\changePassword.blade.php ENDPATH**/ ?>
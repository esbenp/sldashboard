<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="<?php echo e(URL::asset('assets/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
</head>
<body>
<?php echo $__env->yieldContent('content'); ?>

<script src="<?php echo e(URL::asset('assets/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
</body>
</html>
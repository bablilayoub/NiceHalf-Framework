<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User</title>
</head>

<body>
    <h1>User</h1>
    <?php $__currentLoopData = $users['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($user->username); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo paginate($users['current_page'], $users['pages']); ?>

</body>

</html>
<?php /**PATH C:\framework\htdocs\application\views/user/index.blade.php ENDPATH**/ ?>
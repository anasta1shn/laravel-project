<!doctype html>
<html lang="ru">
<head>
    <?php echo $__env->make('layouts.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>

<div class="wrapper">
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php echo $__env->make('layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>

<script>
    if (getCookie('cart') === undefined) {
        let cart = JSON.parse(localStorage.getItem('cart'));

        if (cart !== null) {
            setCookie('cart', JSON.stringify(delUnnecessaryKeys(cart,
                ['product_title', 'product_price', 'product_img']
            )));
        }
    }
</script>
</body>
</html>

<?php /**PATH /var/www/resources/views/layouts/_layout.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Подтверждение заказа'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center h3">
                        <span>Подтверждение заказа</span>
                    </h2>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="<?php echo e(route('confirmOrder')); ?>" method="POST" class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="cartInputAddress" class="form-label required">Адрес доставки</label>
                                    <input type="text" class="form-control mt-1 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="cartInputAddress" name="address" placeholder="г. Екатеринбург, ул. Крауля, д. 168, к. 2, кв. 111" value="<?php echo e(old('address') ?? $address ?? ''); ?>">

                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="cartInputPhone" class="form-label required">Номер телефона</label>
                                    <input type="text" class="form-control mt-1 <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="cartInputPhone" name="phone" placeholder="Введите номер телефона (+7 | 8)" value="<?php if($phone && !old('phone')): ?>+<?php endif; ?><?php echo e(old('phone') ?? $phone ?? ''); ?>">

                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mb-3 cart-summary">
                                    <h3>Итого: <span class="total-price"></span> руб.</h3>
                                </div>
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary" onclick="setCookie('cart', JSON.stringify(JSON.parse(localStorage.getItem('cart'))));
                                    localStorage.clear();">Оформить заказ</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('5904783d-d825-4ca1-a4a0-be9fa0750521')): $__env->markAsRenderedOnce('5904783d-d825-4ca1-a4a0-be9fa0750521');
$__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            let cart = JSON.parse(localStorage.getItem('cart'));

            if (cart === null) {
                cart = JSON.parse(getCookie('cart'));
                console.log(cart);
                localStorage.setItem('cart', JSON.stringify(cart));
            }

            $('.total-price').text(getTotalPrice(cart).toFixed(2));
        })
    </script>
<?php $__env->stopPush(); endif; ?>


<?php echo $__env->make('layouts._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/cart_confirm.blade.php ENDPATH**/ ?>
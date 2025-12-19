<?php $__env->startSection('title', 'Мои заказы'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center">
                        <span>Мои заказы</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <?php if(!($orders->all())): ?>
                <span class="fs-3">Вы пока не совершали заказов...</span>
            <?php else: ?>
            <div class="row">
                <div class="col-lg-8 mb-3">
                    <div class="p-3 h-100 bg-white">

                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span>Заказ № <?php echo e(str_pad($order->id, 10, '0', STR_PAD_LEFT)); ?></span>
                            <br>
                            <span>Дата оформления: <?php echo e(\Carbon\Carbon::parse($order->date)->setTimezone('Asia/Yekaterinburg')->format('d.m.Y, H:i')); ?></span>
                            <br>
                            <span>Адрес доставки: <?php echo e($order->client_address); ?></span>
                            <br>
                            <span>Сумма заказа: <?php echo e($order->price); ?> руб.</span>
                            <br>
                            <span>Статус: <strong><?php echo e(STATUSES[$order->status]); ?></strong></span>
                            <br>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($order->id); ?>" aria-expanded="false" aria-controls="collapse-<?php echo e($order->id); ?>">
                                Состав заказа
                            </button>
                            <br>
                            <br>
                            <div class="table-responsive collapse" id="collapse-<?php echo e($order->id); ?>">
                                <table class="table align-middle table-hover">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>Фото</th>
                                        <th>Товар</th>
                                        <th>Цена</th>
                                        <th>Количество</th>
                                        <th>Общая стоимость</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="product-img-td">
                                                    <a href="<?php echo e(route('product', $product->id)); ?>">
                                                        <img src="<?php echo e($product->image); ?>" alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('product', $product->id)); ?>" class="cart-content-title">
                                                        <?php echo e($product->title); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo e($product->price); ?> руб.
                                                </td>
                                                <td>
                                                    <span class="ms-md-2 me-md-2"><?php echo e($product->pivot->quantity); ?></span>
                                                </td>
                                                <td>
                                                    <?php echo e(number_format($product->getTotalPrice(), 2)); ?> руб.
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/auth/user_orders.blade.php ENDPATH**/ ?>
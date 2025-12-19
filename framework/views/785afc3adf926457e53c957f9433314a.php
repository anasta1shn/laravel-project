<?php $__env->startSection('content'); ?>
    <h4>Заказы</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Дата</th>
                <th>Статус</th>
                <th>Номер телефона</th>
                <th>Адрес доставки</th>
                <th>Заказчик</th>
                <th class="text-center">Действия</th>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($order->id); ?>

                    </td>
                    <td>
                        <?php echo e(\Carbon\Carbon::parse($order->date)->setTimezone('Asia/Yekaterinburg')->format('d.m.Y в H:i')); ?>

                    </td>
                    <td>
                        <?php echo e(STATUSES[$order->status]); ?>

                    </td>
                    <td>
                        <?php echo e($order->client_phone); ?>

                    </td>
                    <td>
                        <?php echo e($order->client_address); ?>

                    </td>
                    <td>
                        <?php echo e($order->user->username); ?>

                    </td>
                    <td class="text-center">
                        <a href="<?php echo e(route('orders.edit', $order)); ?>" role="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <?php if(!$orders->isEmpty()): ?>
        <?php echo e($orders->links()); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin._panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>
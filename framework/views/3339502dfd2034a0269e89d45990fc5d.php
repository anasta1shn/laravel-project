<?php $__env->startSection('content'); ?>
    <h4><?php echo e($form_title); ?></h4>

    <form method="POST" action="<?php echo e(route('orders.update', $order)); ?>">
        <?php echo method_field('PUT'); ?>

        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="orderDate" class="form-label">Дата</label>
            <input type="text" class="form-control"
                   id="orderDate" name="date" value="<?php echo e(\Carbon\Carbon::parse($order->date)->setTimezone('Asia/Yekaterinburg')->format('d.m.Y в H:i')); ?>" disabled>
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="productSelectCategory" class="form-label">Статус</label>
            <select class="form-select" aria-label="Выберите категорию продукции" id="productSelectCategory" name="status">
                <?php $__currentLoopData = STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusId => $statusTitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($statusId); ?>" <?php if($order->status === $statusId): ?> selected <?php endif; ?> <?php if(!in_array($statusId, availableStatuses($order->status))): ?> disabled <?php endif; ?>><?php echo e($statusTitle); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="orderPhone" class="form-label">Номер телефона</label>
            <input type="text" class="form-control"
                   id="orderPhone" name="phone" value="<?php echo e($order->client_phone); ?>" disabled>
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="orderAddress" class="form-label">Адрес доставки</label>
            <input type="text" class="form-control"
                   id="orderAddress" name="address" value="<?php echo e($order->client_address); ?>" disabled>
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="orderCustomer" class="form-label">Заказчик</label>
            <input type="text" class="form-control"
                   id="orderCustomer" name="customer" value="<?php echo e($order->user->username); ?>" disabled>
        </div>

        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
    </form>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin._panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/orders/form.blade.php ENDPATH**/ ?>
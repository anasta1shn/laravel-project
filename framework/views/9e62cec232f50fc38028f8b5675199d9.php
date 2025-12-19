<?php $__env->startSection('content'); ?>
    <h4>Пользователи</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Пароль</th>
                <th>Адрес доставки</th>
                <th>Номер телефона</th>
                <th>Роль</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($user->id); ?>

                    </td>
                    <td>
                        <?php echo e($user->username); ?>

                    </td>
                    <td>
                        <?php echo e($user->email); ?>

                    </td>
                    <td>
                        ********
                    </td>
                    <td>
                        <?php echo e($user->address ?? 'Не указан'); ?>

                    </td>
                    <td>
                        <?php echo e($user->phone_number ?? 'Не указан'); ?>

                    </td>
                    <td>
                        <?php echo e($user->role->title); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <a href="<?php echo e(route('users.create')); ?>" role="button" class="btn btn-sm btn-primary mb-1">
        <i class="fa-solid fa-plus"></i> Добавить
    </a>

    <?php if(!$users->isEmpty()): ?>
        <?php echo e($users->links()); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin._panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/users/index.blade.php ENDPATH**/ ?>
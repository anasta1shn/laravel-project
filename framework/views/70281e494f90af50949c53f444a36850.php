<?php $__env->startSection('content'); ?>
    <h4>Категории продукции</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Название</th>
                <th class="text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($category->id); ?>

                    </td>
                    <td>
                        <?php echo e($category->title); ?>

                    </td>
                    <td class="text-center">
                        <a href="<?php echo e(route('categories.edit', $category)); ?>" role="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <a href="<?php echo e(route('categories.create')); ?>" role="button" class="btn btn-sm btn-primary mb-1">
        <i class="fa-solid fa-plus"></i> Добавить
    </a>

    <?php if(!$categories->isEmpty()): ?>
        <?php echo e($categories->links()); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin._panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>
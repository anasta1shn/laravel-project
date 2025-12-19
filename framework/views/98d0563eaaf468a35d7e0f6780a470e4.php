<?php $__env->startSection('content'); ?>
    <h4>Продукция</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Изображение</th>
                <th class="col-sm-2">Описание</th>
                <th>Вес</th>
                <th>Цена</th>
                <th>Категория</th>
                <th class="text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($product->id); ?>

                    </td>
                    <td>
                        <?php echo e($product->title); ?>

                    </td>
                    <td>
                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->code); ?>" class="admin-product-img">
                    </td>
                    <td>
                        <?php echo e($product->description); ?>

                    </td>
                    <td>
                        <?php echo e($product->weight); ?>

                    </td>
                    <td>
                        <?php echo e($product->price); ?>

                    </td>
                    <td>
                        <?php echo e($product->category->title); ?>

                    </td>
                    <td class="text-center">
                        <a href="<?php echo e(route('products.edit', $product)); ?>" role="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <a href="<?php echo e(route('products.create')); ?>" role="button" class="btn btn-sm btn-primary mb-1">
        <i class="fa-solid fa-plus"></i> Добавить
    </a>

    <?php if(!$products->isEmpty()): ?>
        <?php echo e($products->links()); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin._panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/products/index.blade.php ENDPATH**/ ?>
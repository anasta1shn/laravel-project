<?php $__env->startSection('title', !empty($_GET['search']) ? $_GET['search'] : 'Пустой запрос'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center">
                        <span><?php echo e(!empty($_GET['search']) ? $_GET['search'] : 'Пустой запрос'); ?></span>
                    </h2>
                </div>
            </div>

            <div class="row ">
                <?php if($products->isEmpty()): ?>
                    <span class="fs-3">Ничего не найдено по вашему запросу...</span>
                <?php else: ?>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('product_card', [
                            'product_image' => $product->image,
                            'product_code' => $product->code,
                            'product_title' => $product->title,
                            'product_description' => $product->description,
                            'product_price' => $product->price,
                            'product_category' => $product->category->title
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <?php if(!$products->isEmpty()): ?>
                <?php echo e($products->links()); ?>

            <?php endif; ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/search.blade.php ENDPATH**/ ?>
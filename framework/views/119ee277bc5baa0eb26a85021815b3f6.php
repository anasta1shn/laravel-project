<?php $__env->startSection('title', $product->title); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="container-fluid">
            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>"/>
            <div class="row pt-3">
                <div class="col-md-5 col-lg-4 mb-3">
                    <div class="bg-white">
                        <div class="product-thumb">
                            <a href="<?php echo e(route('product', $product->id)); ?>"><img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->title); ?>" class="product-img"></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-lg-8 mb-3">
                    <div class="bg-white product-content p-3 h-100">
                        <h1 class="section-title h3"><span class="ps-0 product-title"><?php echo e($product->title); ?></span></h1>
                        <p style="color: var(--accent-color)"><?php echo e($product->category->title); ?></p>

                        <?php if(isset($product->description)): ?><p>Описание: <?php echo e($product->description); ?></p><?php endif; ?>

                        <p>Вес: <?php echo e($product->weight); ?> г./шт.</p>

                        <div class="product-price">
                            <span class="price"><?php echo e($product->price); ?></span> руб.
                        </div>

                        <div class="product-add2cart">
                            <div class="input-group">
                                <button type="submit" class="btn btn-outline-secondary add-to-cart"><i class="fas fa-shopping-cart"></i> В корзину</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('af425fbd-c249-4490-96d0-2cf633c06bed')): $__env->markAsRenderedOnce('af425fbd-c249-4490-96d0-2cf633c06bed');
$__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function () {
                let id = $(this).parents('.container-fluid').find('input[name="product_id"]').val();
                let title = $(this).parents('.container-fluid').find('.product-title').text();
                let price = $(this).parents('.container-fluid').find('.price').text();
                let img = $(this).parents('.container-fluid').find('.product-img').attr('src');

                let product = {
                    product_id: id,
                    product_title: title,
                    product_price: price,
                    product_img: img,
                    count: 1,
                };

                let result;
                let cart = JSON.parse(localStorage.getItem('cart'));

                if (cart == null) {
                    result = [product];
                } else {
                    let match = false;

                    cart.map(item => {
                        if (item.product_id === product.product_id) {
                            match = true;
                            return item.count += 1;
                        }
                    })

                    if (match) {
                        result = cart;
                    } else {
                        result = [...cart, product]
                    }
                }

                $('.products-count').text(result.reduce((sum, item) => sum + item.count, 0));
                localStorage.setItem('cart', JSON.stringify(result));

                setCookie('cart', JSON.stringify(delUnnecessaryKeys(result,
                    ['product_title', 'product_price', 'product_img']
                )));
            })
        })
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('layouts._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/product.blade.php ENDPATH**/ ?>
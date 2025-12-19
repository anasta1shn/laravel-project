<?php $__env->startSection('title', 'Главная'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div id="carousel" class="carousel slide carousel-fade d-none d-md-block"><!--carousel-fade -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
                        aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo e(asset('img/homepage_carousel/buns-1.jpg')); ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>Печем от всей души!</h5>
                        <p>Именно поэтому наша продукция так вкусна.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('img/homepage_carousel/buns-2.jpg')); ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>Используем креативность наших сотрудников!</h5>
                        <p>Именно поэтому наша продукция так красива.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('img/homepage_carousel/buns-3.jpg')); ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>Заказываем только проверенное сырье!</h5>
                        <p>Именно поэтому наша продукция богата полезными веществами.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('img/homepage_carousel/buns-4.jpg')); ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>Уделяем особое внимание праздникам!</h5>
                        <p>Именно поэтому наша продукция дарит хорошее настроение.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('img/homepage_carousel/buns-5.jpg')); ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>Ищем рецепты со всего мира!</h5>
                        <p>Именно поэтому наша продукция удивляет.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section class="featured-products px-md-3">
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="section-title text-center">
                            <span>Последние товары</span>
                        </h2>
                    </div>
                </div>

                <div class="row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('product_card', [
                            'product' => $product,
//                            'product_image' => $product->image,
//                            'product_title' => $product->title,
//                            'product_description' => $product->description,
//                            'product_price' => $product->price,
//                            'product_category' => $product->category->title
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

        <section class="about-us" id="about">
            <div class="container fluid">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="section-title text-center">
                            <span>История нашей пекарни</span>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>Наша пекарня была основана в далеком 2020 году молодыми предпринимательницами Прокофьевой Анастасией и Моисеевой Марией.</p>
                        <p>
                            <strong>Так и появилась наша любимая пекарня "Bread"!</strong>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="advantages">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title text-center">
                            <span>Наши преимущества</span>
                        </h2>
                    </div>
                </div>
                <div class="row gy-3 items">
                    <div class="col-lg-3 col-sm-6">
                        <div class="item">
                            <p>
                                <i class="fas fa-face-smile"></i>
                            </p>
                            <p>Высокое качество продукции</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="item">
                            <p>
                                <i class="fas fa-layer-group"></i>
                            </p>
                            <p>Широкий ассортимент товаров</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="item">
                            <p>
                                <i class="fa-solid fa-money-bill-1-wave"></i>
                            </p>
                            <p>Приятные цены</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="item">
                            <p>
                                <i class="fa-solid fa-people-group"></i>
                            </p>
                            <p>Профессионалы своего дела</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="find-us pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title text-center">
                            <span>Как нас найти</span>
                        </h2>
                    </div>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2182.7587610257515!2d60.52178597656027!3d56.83292790828415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c16fa4cafcf3bb%3A0x5f3e35aa95939958!2sUral&#39;skiy%20Gosudarstvennyy%20Radiotekhnicheskiy%20Kolledzh.!5e0!3m2!1sen!2sru!4v1701065387606!5m2!1sen!2sru"
                    width="100%" height="450" style="border:0; display: block" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts._layout', ['categories' => $categories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/index.blade.php ENDPATH**/ ?>
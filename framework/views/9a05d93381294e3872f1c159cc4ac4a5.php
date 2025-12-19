<header class="header">
    <div class="header-top py-1">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6 col-md-4">
                    <a href="<?php echo e(route('index')); ?>" class="header-logo h1"><img src="/img/bread_logo.svg" alt="Bread" class="bread-logo"/></a>
                </div>

                <div class="col-12 col-md-4 order-md-1 order-2 d-md-block d-flex justify-content-center mt-1 mt-md-0 mb-md-0 mb-1 p-0">
                    <form action="<?php echo e(route('search')); ?>">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Поиск" aria-label="Поиск" aria-describedby="button-search" value="<?php echo e($_GET['search'] ?? ''); ?>">
                            <button class="btn btn-outline-secondary" type="submit" id="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-end order-md-2 order-1">
                    <div class="header-top-signbtns">
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('user.login')); ?>">
                                <button type="button" class="btn btn-sm">
                                    Вход
                                </button>
                            </a>
                            <a href="<?php echo e(route('user.registration')); ?>">
                                <button type="button" class="btn btn-sm">
                                    Регистрация
                                </button>
                            </a>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary-outline btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Аккаунт
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark z-4">
                                        <li class="dropdown-header" style="color: var(--accent-color)"><?php echo e(auth()->user()->username); ?></li>
                                        <li><a class="dropdown-item" href="<?php echo e(route('user.userOrders')); ?>">Мои заказы</a></li>
                                        <li><a class="dropdown-item" href="<?php echo e(route('user.userSettings')); ?>">Настройки</a></li>

                                        <?php if(auth()->user()->isAdmin()): ?>
                                            <li><a class="dropdown-item" href="<?php echo e(route('users.index')); ?>">Панель администратора</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <a href="<?php echo e(route('user.logout')); ?>">
                                <button type="button" class="btn btn-sm">
                                    Выйти
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</header>

<div class="header-bottom sticky-top z-3">
    <nav class="navbar navbar-expand-sm bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="offcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title " id="offcanvasProductsLabel" style="color: var(--accent-color)">Наша продукция</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav m-auto">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a <?php echo (isset($active_category) && $active_category === $category->id) ?
                                        'class="nav-link active" aria-current="page"' :
                                        'class="nav-link"'; ?>

                                        href="<?php echo e(route('category', $category->id)); ?>">
                                    <?php echo e($category->title); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            <div id="navbar-cart">
                <a href="<?php echo e(asset('cart')); ?>">
                    <button class="btn position-relative" type="button">
                        <i class="fa-solid fa-cart-shopping cart-shopping-navbar"></i>
                        <span class="position-absolute top-0 start-50 badge rounded-pill bg-danger products-count"></span>
                    </button>
                </a>
            </div>
        </div>
    </nav>
</div>


 <?php if(session()->has('warning')): ?>
     <p class="alert alert-danger text-center m-1"><?php echo e(session()->get('warning')); ?></p>
 <?php endif; ?>

 <?php if(session()->has('success')): ?>
     <p class="alert alert-success text-center m-1"><?php echo e(session()->get('success')); ?></p>
 <?php endif; ?>

 <?php if (! $__env->hasRenderedOnce('7ca803ae-3552-477a-8c97-9789d34dcb41')): $__env->markAsRenderedOnce('7ca803ae-3552-477a-8c97-9789d34dcb41');
$__env->startPush('scripts'); ?>
     <script>
         $(document).ready(function() {
             let cart = JSON.parse(localStorage.getItem('cart'));

             if (cart != null) {
                 if (cart.length > 0) {
                     $('.products-count').text(cart.reduce((sum, item) => sum + item.count, 0));
                 }
             }
         })
     </script>
 <?php $__env->stopPush(); endif; ?>

<?php /**PATH /var/www/resources/views/layouts/header.blade.php ENDPATH**/ ?>
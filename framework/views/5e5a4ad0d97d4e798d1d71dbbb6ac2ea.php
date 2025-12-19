<?php $__env->startSection('title', 'Настройки аккаунта'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center">
                        <span>Настройки аккаунта</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-sm-8 mx-auto">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="fw-bold">Имя:</span>
                                <span><?php echo e($user->username); ?></span>
                            </div>

                            <div>
                                <button class="btn btn-sm btn-primary justify-content-end" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-username" aria-expanded="<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> true <?php else: ?> false <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        aria-controls="collapse-username">
                                    Изменить
                                </button>
                            </div>
                        </div>

                        <div class="collapse <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> show <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="collapse-username">
                            <form action="<?php echo e(route('user.userChangeName')); ?>" method="POST">
                                <label for="changeInputUsername" class="form-label" hidden></label>
                                <input type="text" class="form-control mt-1 <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="changeInputUsername" name="username" placeholder="Введите новое имя пользователя" value="<?php echo e(old('username')); ?>">

                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <?php echo csrf_field(); ?>
                                <button class="btn btn-sm btn-success mt-2" type="submit">Сохранить</button>
                            </form>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="fw-bold">Почта:</span>
                                <span><?php echo e($user->email); ?></span>
                            </div>

                            <div>
                                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-email" aria-expanded="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> true <?php else: ?> false <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        aria-controls="collapse-email">
                                    Изменить
                                </button>
                            </div>
                        </div>

                        <div class="collapse <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> show <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="collapse-email">
                            <form action="<?php echo e(route('user.userChangeEmail')); ?>" method="POST">
                                <label for="changeInputEmail" class="form-label" hidden></label>
                                <input type="text" class="form-control mt-1 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="changeInputEmail" name="email" placeholder="Введите новый email" value="<?php echo e(old('email')); ?>">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <?php echo csrf_field(); ?>
                                <button class="btn btn-sm btn-success mt-2" type="submit">Сохранить</button>
                            </form>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="fw-bold">Пароль:</span>
                                <span>********</span>
                            </div>

                            <div>
                                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-password" aria-expanded="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> true <?php else: ?> false <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        aria-controls="collapse-email">
                                    Изменить
                                </button>
                            </div>
                        </div>

                        <div class="collapse <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> show <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="collapse-password">
                            <form action="<?php echo e(route('user.userChangePassword')); ?>" method="POST">
                                <label for="changeInputPassword" class="form-label" hidden></label>
                                <input type="text" class="form-control mt-1 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="changeInputPassword" name="password" placeholder="Введите новый пароль">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <?php echo csrf_field(); ?>
                                <button class="btn btn-sm btn-success mt-2" type="submit">Сохранить</button>
                            </form>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="fw-bold">Адрес доставки:</span>
                                <span><?php echo e($user->address ?? 'Не указан'); ?></span>
                            </div>

                            <div>
                                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-address" aria-expanded="<?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> true <?php else: ?> false <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        aria-controls="collapse-address">
                                    Изменить
                                </button>
                            </div>
                        </div>

                        <div class="collapse <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> show <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="collapse-address">
                            <form action="<?php echo e(route('user.userChangeAddress')); ?>" method="POST">
                                <label for="changeInputAddress" class="form-label" hidden></label>
                                <input type="text" class="form-control mt-1 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="changeInputAddress" name="address" placeholder="г. Екатеринбург, ул. Крауля, д. 168, к. 2, кв. 111" value="<?php echo e(old('address')); ?>">

                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <?php echo csrf_field(); ?>
                                <button class="btn btn-sm btn-success mt-2" type="submit">Сохранить</button>
                            </form>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="fw-bold">Номер телефона:</span>
                                <span><?php echo e(phoneToFormat($user->phone_number) ?? 'Не указан'); ?></span>
                            </div>

                            <div>
                                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-phone_number" aria-expanded="<?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> true <?php else: ?> false <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        aria-controls="collapse-phone_number">
                                    Изменить
                                </button>
                            </div>
                        </div>

                        <div class="collapse <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> show <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="collapse-phone_number">
                            <form action="<?php echo e(route('user.userChangePhone')); ?>" method="POST">
                                <label for="changeInputPhone" class="form-label" hidden></label>
                                <input type="text" class="form-control mt-1 <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="changeInputPhone" name="phone_number" placeholder="Введите номер телефона (+7 | 8)" value="<?php echo e(old('phone_number')); ?>">

                                <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <?php echo csrf_field(); ?>
                                <button class="btn btn-sm btn-success mt-2" type="submit">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/auth/user_settings.blade.php ENDPATH**/ ?>
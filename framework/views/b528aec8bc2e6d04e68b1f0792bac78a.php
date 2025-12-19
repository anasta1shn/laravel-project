<?php $__env->startSection('content'); ?>
    <h4><?php echo e($form_title); ?></h4>

    <form method="POST"
        <?php if(isset($category)): ?>
            action="<?php echo e(route('categories.update', $category)); ?>"
        <?php else: ?>
            action="<?php echo e(route('categories.store')); ?>"
        <?php endif; ?>
    >
        <?php if(isset($category)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>









        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="categoryInputTitle" class="form-label required">Название</label>
            <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   id="categoryInputTitle" name="title" placeholder="Название категории" value="<?php echo e(old('title') ?? $category->title ?? ''); ?>">

            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin._panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/categories/form.blade.php ENDPATH**/ ?>
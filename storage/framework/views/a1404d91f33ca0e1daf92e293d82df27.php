<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-4"><i class="fa-solid fa-file-circle-plus text-success me-2"></i> Upload Document</h3>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following issues:<br><br>
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="small"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?php echo e(route('documents.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Document Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title')); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description (optional)</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description')); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label fw-semibold">Select File</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_public" id="is_public" <?php echo e(old('is_public') ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="is_public">
                        Make this document public
                    </label>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-cloud-upload-alt me-1"></i> Upload
                </button>
                <a href="<?php echo e(route('documents.index')); ?>" class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\AMS_SNSU-master\AMS_SNSU-master\resources\views/documents/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-4"><i class="fa-solid fa-eye text-primary me-2"></i> Public Documents</h3>

    <?php if($publicDocuments->isEmpty()): ?>
        <div class="alert alert-info">
            <i class="fa-solid fa-folder-open me-1"></i> No public documents found.
        </div>
    <?php else: ?>
        <div class="row">
            <?php $__currentLoopData = $publicDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-solid fa-file-alt me-1"></i> <?php echo e($doc->title); ?></h5>
                            <p class="text-muted small">Uploaded by <?php echo e($doc->user->name); ?></p>
                            <p><?php echo e(Str::limit($doc->description, 100)); ?></p>
                            <a href="<?php echo e(asset('storage/' . $doc->file_path)); ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="fa-solid fa-eye me-1"></i> View Document
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\AMS_SNSU-master\AMS_SNSU-master\resources\views/viewer/index.blade.php ENDPATH**/ ?>
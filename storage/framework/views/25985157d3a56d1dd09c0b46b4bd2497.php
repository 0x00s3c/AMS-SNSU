<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h2 class="text-primary">Welcome, <?php echo e($user->name); ?></h2>
    <p class="text-muted">You are logged in as <strong><?php echo e(ucfirst($user->role)); ?></strong>.</p>

    <div class="row mt-4 g-3">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">📁 Documents</h5>
                    <p class="card-text">Manage accreditation evidence files.</p>
                    <a href="<?php echo e(route('documents.index')); ?>" class="btn btn-primary">Go to Documents</a>
                </div>
            </div>
        </div>

        <?php if($user->role === 'qa'): ?>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">📝 QA Workflow</h5>
                    <p class="card-text">Track department submissions & tasks.</p>
                    <a href="#" class="btn btn-success disabled">Coming Soon</a>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if($user->role === 'external'): ?>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">🔍 Document Review</h5>
                    <p class="card-text">Rate and comment on uploaded documents.</p>
                    <a href="<?php echo e(route('review.index')); ?>" class="btn btn-warning">Review Documents</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\AMS_SNSU-master\AMS_SNSU-master\resources\views/dashboard.blade.php ENDPATH**/ ?>
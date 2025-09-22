<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-4"><i class="fa-solid fa-folder-open text-success me-2"></i> Document Repository</h3>

    <?php if(session('success')): ?>
        <div class="alert alert-success small"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-3">
        <a href="<?php echo e(route('documents.create')); ?>" class="btn btn-success">
            <i class="fa-solid fa-upload me-1"></i> Upload New
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <?php if($documents->isEmpty()): ?>
                <p class="text-muted">No documents uploaded yet.</p>
            <?php else: ?>
                <table class="table table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>Title</th>
                            <th>Uploader</th>
                            <th>Version</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($doc->title); ?></td>
                                <td><?php echo e($doc->user->name); ?></td>
                                <td>v<?php echo e($doc->version); ?></td>
                                <td><?php echo e($doc->created_at->format('Y-m-d')); ?></td>
                                <td>
                                    <a href="<?php echo e(asset('storage/' . $doc->file_path)); ?>" target="_blank" class="btn btn-sm btn-outline-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <?php if(auth()->user()->id === $doc->uploaded_by || auth()->user()->role === 'admin'): ?>
                                    <form method="POST" action="<?php echo e(route('documents.destroy', $doc->id)); ?>" class="d-inline">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this document?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\AMS_SNSU-master\AMS_SNSU-master\resources\views/documents/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="blog-post-meta"><?php echo e($notice->title); ?></p>
                <p><?php echo e($notice->description); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
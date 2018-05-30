<?php $__env->startSection('content'); ?>
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <div style="display:inline-flex">
                <h2 class="blog-post-title"><?php echo e($post->title); ?></h2>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$post)): ?>
                    <a style="margin: auto"  href="/posts/<?php echo e($post->id); ?>/edit">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                <?php endif; ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete',$post)): ?>
                <a style="margin: auto"  href="/posts/<?php echo e($post->id); ?>/delete">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
                <?php endif; ?>
            </div>

            <p class="blog-post-meta"><?php echo e($post->created_at->toFormattedDateString()); ?> <a href="#"><?php echo e($post->user->name); ?></a></p>

            <p><?php echo $post->content; ?></p>
            <div>
                <?php if($post->zan(\Auth::id())->exists()): ?>
                    <a href="/posts/<?php echo e($post->id); ?>/unzan" type="button" class="btn btn-default btn-lg">取消赞</a>
                <?php else: ?>
                    <a href="/posts/<?php echo e($post->id); ?>/zan" type="button" class="btn btn-primary btn-lg">赞</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">评论</div>

            <!-- List group -->
            <ul class="list-group">
                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <h5><?php echo e($comment->created_at); ?> by <?php echo e($comment->user->name); ?></h5>
                    <div>
                       <?php echo e($comment->content); ?>

                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">发表评论</div>

            <!-- List group -->
            <ul class="list-group">
                <form action="/posts/<?php echo e($post->id); ?>/comment" method="post">
                    <?php echo e(csrf_field()); ?>

                    
                    <li class="list-group-item">
                        <textarea name="content" class="form-control" rows="10"></textarea>

                        <?php echo $__env->make('layout.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <button class="btn btn-default" type="submit">提交</button>
                    </li>
                </form>

            </ul>
        </div>

    </div><!-- /.blog-main -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
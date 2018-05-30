<?php $__env->startSection('content'); ?>
        <div class="col-sm-8">
            <blockquote>
                <p><?php echo e($topic->name); ?></p>
                <footer>文章：<?php echo e($topic->post_topics_count); ?></footer>
                <button class="btn btn-default topic-submit"  data-toggle="modal" data-target="#topic_submit_modal" topic-id="<?php echo e($topic->id); ?>"  type="button">投稿</button>
            </blockquote>
        </div>
        <div class="modal fade" id="topic_submit_modal" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">我的文章</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/topic/<?php echo e($topic->id); ?>/submit" method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php $__currentLoopData = $myposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="post_ids[]" value="<?php echo e($post->id); ?>">
                                    <?php echo e($post->title); ?>

                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <button type="submit" class="btn btn-default">投稿</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 blog-main">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a href="/user/<?php echo e($post->user->id); ?>"><?php echo e($post->user->name); ?></a> <?php echo e($post->created_at->diffForHumans()); ?></p>
                            <p class=""><a href="/posts/<?php echo e($post->id); ?>" ><?php echo e($post->title); ?></a></p>

                            <p><?php echo str_limit($post->content,100,'..'); ?></p>
                        </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <!-- /.tab-content -->
            </div>


        </div><!-- /.blog-main -->
    <?php $__env->stopSection(); ?>






<?php echo $__env->make('layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
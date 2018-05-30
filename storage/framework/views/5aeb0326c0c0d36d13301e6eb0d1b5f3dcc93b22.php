<?php $__env->startSection('content'); ?>
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-10 col-xs-6">
                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">通知列表</h3>
                        </div>
                        <a type="button" class="btn " href="/admin/notices/create">增加通知</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <th style="width: 10px">#</th>
                                    <th>通知名称</th>
                                    <th>操作</th>
                                </tr>
                                <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($notice->id); ?></td>
                                    <td><?php echo e($notice->title); ?></td>
                                    <td></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">专题列表</h3>
                    </div>
                    <a type="button" class="btn " href="/admin/topics/create" >增加专题</a>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="width: 10px">#</th>
                                <th>专题名称</th>
                                <th>操作</th>
                            </tr>
                            <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($topic->id); ?></td>
                                <td><?php echo e($topic->name); ?></td>
                                <td>
                                    <a type="button" class="btn resource-delete" delete-url="/admin/topics/<?php echo e($topic->id); ?>" href="#" >删除</a>
                                </td>
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
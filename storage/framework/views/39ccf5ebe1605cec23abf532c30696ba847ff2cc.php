<?php $__env->startSection('content'); ?>
    <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-10 col-xs-6">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">权限列表</h3>
                </div>
                <a type="button" class="btn " href="/admin/permissions/create" >增加权限</a>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>权限名称</th>
                            <th>描述</th>
                            <th>操作</th>
                        </tr>
                      <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($permission->id); ?></td>
                            <td><?php echo e($permission->name); ?></td>
                            <td><?php echo e($permission->description); ?></td>
                            <td>
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
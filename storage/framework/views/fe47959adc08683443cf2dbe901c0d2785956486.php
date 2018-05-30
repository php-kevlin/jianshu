<?php $__env->startSection('content'); ?>
    <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-10 col-xs-6">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">角色列表</h3>
                </div>
                <a type="button" class="btn " href="/admin/roles/create" >增加角色</a>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>角色名称</th>
                            <th>角色描述</th>
                            <th>操作</th>
                        </tr>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($role->id); ?></td>
                            <td><?php echo e($role->name); ?></td>
                            <td><?php echo e($role->permission); ?></td>
                            <td>
                                <a type="button" class="btn" href="/admin/roles/<?php echo e($role->id); ?>/permission" >权限管理</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody></table>
                    <?php echo e($roles->links()); ?>

                </div>

            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
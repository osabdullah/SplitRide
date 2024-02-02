<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Users</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Notifications Status</th>
                        <th>Enable/Disable</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($u['id']); ?></td>
                            <td><?php echo e($u['name']); ?></td>
                            <td><?php echo e($u['email']); ?></td>
                            <td><?php echo e($u['notification_status']); ?></td>
                           <?php if($u['notification_status'] === 0): ?>
                            <td>

                                <form action="<?php echo e("/editNotificationStatus/".$u['id']); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="notification_status" value="1">
                                <button type="submit" class="btn btn-success" >Enable</button>
                                </div>
                                </form>
                            </td>
                                <?php else: ?>
                                <td>
                                <form action="<?php echo e("/editNotificationStatus/".$u['id']); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="notification_status" value="0">
                                <button type="submit" class="btn btn-primary">Disable</button>
                                </div>
                                </form>

                            </td>
 <?php endif; ?>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="<?php echo e("/editUser/".$u['id']); ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?php echo e("/delUser/".$u['id']); ?>">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Laravel_Projects/BookingWebSite/resources/views/admin/Users/show.blade.php ENDPATH**/ ?>
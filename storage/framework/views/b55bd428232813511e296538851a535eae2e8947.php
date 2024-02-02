<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Rides</h1>
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
                        <!-- <th>Id</th> -->
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Total Capacity</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $rides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ride): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <!-- <td><?php echo e($ride['id']); ?></td> -->
                            <td><?php echo e($ride['title']); ?></td>
                            <td><?php echo e($ride['description']); ?></td>
                            <td><?php echo e($ride['price']); ?></td>
                            <td><?php echo e($ride['origion']); ?></td>
                            <td><?php echo e($ride['destination']); ?></td>
                            <td><?php echo e($ride['totalCapacity']); ?></td>


                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="<?php echo e("/editLoggedInUserRides/".$ride['id']); ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?php echo e("/delRide/".$ride['id']); ?>">
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Laravel_Projects/BookingWebSite/resources/views/admin/Rides/showLoggedIn.blade.php ENDPATH**/ ?>
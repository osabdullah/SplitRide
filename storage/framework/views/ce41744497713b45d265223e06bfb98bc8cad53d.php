 
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Ride</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-sm-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Ride</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/editRide" method="POST">
                 <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" value="<?php echo e($data['title']); ?>">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter description" value="<?php echo e($data['description']); ?>">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input @keydown.space.prevent type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price" value="<?php echo e($data['price']); ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Origion</label>
                    <input type="text" name="origion" class="form-control" id="exampleInputEmail1" placeholder="Enter origion" value="<?php echo e($data['origion']); ?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Destination</label>
                    <input type="text" name="destination" class="form-control" id="exampleInputEmail1" placeholder="Enter destination" value="<?php echo e($data['destination']); ?>">
                  </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                    <label for="exampleInputEmail1">Time of Ride</label>
                    <input type="text" name="timeOfRide" class="form-control" id="exampleInputEmail1" placeholder="Enter time of ride" value="<?php echo e($data['timeOfRide']); ?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">capacity</label>
                    <input type="text" name="totalCapacity" class="form-control" id="exampleInputEmail1" placeholder="Enter total capacity" value="<?php echo e($data['totalCapacity']); ?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Available Capacity</label>
                    <input type="text" name="availableCapacity" class="form-control" id="exampleInputEmail1" placeholder="Enter available capacity" value="<?php echo e($data['availableCapacity']); ?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" name="status" class="form-control" id="exampleInputEmail1" placeholder="Enter status" value="<?php echo e($data['status']); ?>">
                  </div>
                        </div>
                    </div>


                </div>
                <input type="hidden" name="id" value=<?php echo e($data['id']); ?> >
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit Ride</button>
                </div>
              </form>
            </div>
        </div>
        </div>
</section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Laravel_Projects/BookingWebSite/resources/views/admin/Rides/edit.blade.php ENDPATH**/ ?>
 @extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
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
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/editUser" method="POST">
                 @csrf
                <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter title" value="{{ $user['name'] }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter description" value="{{ $user['email'] }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password(if you not enter password password will remain same)</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1"  >
                  </div>
                  <input type="hidden" name="id" value="{{ $user['id'] }}">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit User</button>
                </div>
                    </div>
              </form>
            </div>
        </div>
        </div>
</section>
</div>
@endsection

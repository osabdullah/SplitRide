@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Notification</h1>
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
                        <th>Message</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($notifications as $n)
                        <tr>
                            <td>{{ $n['id'] }}</td>
                            <td>{{ $n['message'] }}</td>

                            <td>{{ $n['type'] }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-danger btn-sm" href="{{"/delNotifications/".$n['id'] }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>
@endsection

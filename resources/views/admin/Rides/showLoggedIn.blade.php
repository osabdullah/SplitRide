@extends('admin.layouts.app')
@section('content')
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
                  @foreach($rides as $ride)
                        <tr>
                            <!-- <td>{{ $ride['id'] }}</td> -->
                            <td>{{ $ride['title'] }}</td>
                            <td>{{ $ride['description'] }}</td>
                            <td>{{ $ride['price'] }}</td>
                            <td>{{ $ride['origion'] }}</td>
                            <td>{{ $ride['destination'] }}</td>
                            <td>{{ $ride['totalCapacity'] }}</td>


                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{"/editLoggedInUserRides/".$ride['id'] }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{"/delRide/".$ride['id'] }}">
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

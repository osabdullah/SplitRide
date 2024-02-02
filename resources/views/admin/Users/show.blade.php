@extends('admin.layouts.app')
@section('content')
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
                  @foreach($users as $u)
                        <tr>
                            <td>{{ $u['id'] }}</td>
                            <td>{{ $u['name'] }}</td>
                            <td>{{ $u['email'] }}</td>
                            <td>{{ $u['notification_status'] }}</td>
                           @if($u['notification_status'] === 0)
                            <td>

                                <form action="{{ "/editNotificationStatus/".$u['id'] }}" method="POST">
                                @csrf
                                <input type="hidden" name="notification_status" value="1">
                                <button type="submit" class="btn btn-success" >Enable</button>
                                </div>
                                </form>
                            </td>
                                @else
                                <td>
                                <form action="{{ "/editNotificationStatus/".$u['id'] }}" method="POST">
                                @csrf
                                <input type="hidden" name="notification_status" value="0">
                                <button type="submit" class="btn btn-primary">Disable</button>
                                </div>
                                </form>

                            </td>
 @endif
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{"/editUser/".$u['id'] }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{"/delUser/".$u['id'] }}">
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

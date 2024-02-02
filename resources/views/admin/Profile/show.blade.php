@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>

        </div>
      </div>
    </section>
   <!-- <section class="content"> -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">


            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('frontend_assets/profileImages/'.$user[0]->photo)  }}"
                       alt="User profile picture" />
                </div>

                <h3 class="profile-username text-center">{{ $user[0]->name }}</h3>
                @if($user[0]->notification_status === 0)
                            <div>

                                <form action="{{ "/editNotificationStatusSingleUser/".$user[0]->id }}" method="POST">
                                @csrf
                                <input type="hidden" name="notification_status" value="1">
                                <button type="submit" class="btn btn-success" >Enable</button>
                                </div>
                                </form>
                            </div>
                                @else
                                <div>
                                <form action="{{ "/editNotificationStatusSingleUser/".$user[0]->id }}" method="POST">
                                @csrf
                                <input type="hidden" name="notification_status" value="0">
                                <button type="submit" class="btn btn-primary">Disable</button>
                                </div>
                                </form>

                            </div>
                @endif

              </div>

            </div>

          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">

                  <li class="nav-item"><a class="nav-link " href="#editProfile" data-toggle="tab">Edit Profile</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane" id="editProfile">
                    <form class="form-horizontal" action="/editProfile" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="inputName">Name</label>

                          <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{ $user[0]->name }}">

                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter description" value="{{ $user[0]->email }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Password(if you not enter password password will remain same)</label>
                        <input type="password" name="password" class="form-control" id="exampleInputEmail1"  >
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" >Image</label>

                          <input type="file" name="image" class="form-control" placeholder="image" value="{{ $user[0]->photo }}">

                      </div>
                      <div class="form-group">
                        <div>
                          <button type="submit" class="btn btn-danger">Edit</button>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>

              </div>

          </div>

        </div>

      </div>
    </section>
</div>
@endsection

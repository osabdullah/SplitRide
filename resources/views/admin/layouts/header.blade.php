 <!-- Navbar -->
 <?php
 use App\Models\Notification;
            $loggedInUserId=Auth::user()->id;
            $notifications=Notification::where([['user_id',$loggedInUserId],['status',0]])->get();
            $notification_count=$notifications->count();

 ?>
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/" role="button">Home</i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">{{ $notification_count }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @foreach($notifications as $noti)

          <a type="submit" class="dropdown-item">

            <form method="post" action="{{ "/changeNotificationStatus/".$noti->id }}" >
            @csrf
            <!-- Notification Start -->
            <button type="submit" style="border:none;background-color:transparent;width:100%">
            <div class="media">
              <!-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{ $noti->title}}
                  <!-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> -->
                </h3>
                <p class="text-sm">{{ $noti->message}}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $noti->type}}</p>
              </div>
            </div>
            </button>
            <!-- Notification End -->
            <!-- <button type="submit">See</button> -->
            </form>
          </a>
          @endforeach
          <div class="dropdown-divider"></div>


          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
       <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                 </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                </form>
            </div>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->


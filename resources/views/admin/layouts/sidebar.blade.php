<?php

  $role=Auth::user()->role_id;

?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <span class="brand-text font-weight-light">Rides Booking</span>
    </a>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- If loggedin user is admin -->
        @if($role == 1)
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Rides
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/addRide" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Ride</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/showAllRides" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Rides</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Chats
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/addChat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chat</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="/addGroupChat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Group Chat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Notifications
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="/addstudent" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Notification</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="/allNotifications" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Notifications</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/allUsers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/showProfile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        @else
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Rides
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/addRide" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Ride</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/showAllRidesOfLoggedInUser" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Rides</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Chats
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/addChat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chat</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="/addGroupChat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Group Chat</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/showProfile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- <?php
session_start();
require_once("config.php");
?> -->
<aside style="main-sidebar:height: 100vh !important;
    position: fixed";
  class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="dist/index3.html" class="brand-link">
    <img src="dist/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity:.8">
    <span class="brand-text font-weight-light">Daily Event</span>
  </a>

  <div class="sidebar">
    <!-- User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/dist/img/mira.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Azmira Khatun</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
 <a href="home.php?page=0" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- ONLY FOR ADMIN -->
        <?php if(isset($_SESSION["s_role"]) && $_SESSION["s_role"]=="Admin") { ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>Users<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="home.php?page=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i> Add User</a></li>
            <li class="nav-item">
              <a href="home.php?page=2" class="nav-link">
                <i class="far fa-circle nav-icon"></i> Manage Users</a></li>
          </ul>
        </li>
        <?php } ?>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Event Management<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="home.php?page=4" class="nav-link"><i class="far fa-circle nav-icon"></i> Add Event</a></li>
            <li class="nav-item"><a href="home.php?page=5" class="nav-link"><i class="far fa-circle nav-icon"></i> Manage Event</a></li>
          </ul>
        </li>
<!-- venue start -->
  <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Venue Manage<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="home.php?page=7" class="nav-link">
              <i class="far fa-circle nav-icon"></i> Add Venue</a></li>
            <li class="nav-item"><a href="home.php?page=8" class="nav-link">
              <i class="far fa-circle nav-icon"></i>Venue Details</a></li>
          </ul>
        </li>
        <!-- booking start -->
  <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Booking Management<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="home.php?page=10" class="nav-link">
              <i class="far fa-circle nav-icon"></i> New Booking</a></li>
            <li class="nav-item"><a href="home.php?page=11" class="nav-link">
              <i class="far fa-circle nav-icon"></i>Manage Bookings</a></li>
          </ul>
        </li>




      </ul>
    </nav>
  </div>
</aside>

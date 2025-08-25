<?php
require_once("config.php");
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">

      <!-- First Row -->
      <div class="row mb-4">
        <!-- Card 1 -->
        <div class="col-md-3 mb-4">
          <div class="card text-white bg-primary h-100">
            <div class="card-body d-flex align-items-center">
              <i class="fas fa-file-alt fa-3x me-3"></i>
              <div>
                <h3 class="mb-0">7</h3>
                <p class="mb-0">Listed Categories</p>
              </div>
            </div>
            <div class="card-footer bg-white text-primary d-flex justify-content-between">
              <a href="#">View Details</a><i class="fas fa-plus"></i>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-3 mb-4">
          <div class="card text-white bg-success h-100">
            <div class="card-body d-flex align-items-center">
              <i class="fas fa-server fa-3x me-3"></i>
              <div>
                <h3 class="mb-0">4</h3>
                <p class="mb-0">Sponsors</p>
              </div>
            </div>
            <div class="card-footer bg-white text-success d-flex justify-content-between">
              <a href="#">View Details</a>
              <i class="fas fa-plus"></i>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-3 mb-4">
          <div class="card text-white bg-warning h-100">
            <div class="card-body d-flex align-items-center">
              <i class="fas fa-calendar fa-3x me-3"></i>
              <div>
                <h3 class="mb-0">2</h3>
                <p class="mb-0">Total Events</p>
              </div>
            </div>
            <div class="card-footer bg-white text-warning d-flex justify-content-between">
              <a href="#">View Details</a>
              <i class="fas fa-plus"></i>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-3 mb-4">
          <div class="card text-white bg-danger h-100">
            <div class="card-body d-flex align-items-center">
              <i class="fas fa-users fa-3x me-3"></i>
              <div>
                <h3 class="mb-0">2</h3>
                <p class="mb-0">Total Reg. Users</p>
              </div>
            </div>
            <div class="card-footer bg-white text-danger d-flex justify-content-between">
              <a href="#">View Details</a>
              <i class="fas fa-plus"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Second Row -->
      <div class="row mb-4">
        <!-- Card 5: Total Bookings -->
        <div class="col-md-3 mb-4">
          <div class="card text-white bg-warning h-100">
            <div class="card-body d-flex align-items-center">
              <i class="fas fa-book fa-3x me-3"></i>
              <div>
                <h3 class="mb-0">2</h3>
                <p class="mb-0">Total Bookings</p>
              </div>
            </div>
            <div class="card-footer bg-white text-warning d-flex justify-content-between align-items-center">
              <a href="#" class="text-warning text-decoration-none">View Details</a>
              <i class="fas fa-circle"></i>
            </div>
          </div>
        </div>

        <!-- Card 6: New Booking -->
        <div class="col-md-3 mb-4">
          <div class="card text-white bg-primary h-100">
            <div class="card-body d-flex align-items-center">
              <i class="fas fa-book fa-3x me-3"></i>
              <div>
                <h3 class="mb-0">0</h3>
                <p class="mb-0">New Booking</p>
              </div>
            </div>
            <div class="card-footer bg-white text-primary d-flex justify-content-between align-items-center">
              <a href="#" class="text-primary text-decoration-none">View Details</a>
              <i class="fas fa-circle"></i>
            </div>
          </div>
        </div>

        <!-- Card 7: Confirmed Booking -->
        <div class="col-md-3 mb-4">
          <div class="card text-white bg-success h-100">
            <div class="card-body d-flex align-items-center">
              <i class="fas fa-book fa-3x me-3"></i>
              <div>
                <h3 class="mb-0">2</h3>
                <p class="mb-0">Confirmed Booking</p>
              </div>
            </div>
            <div class="card-footer bg-white text-success d-flex justify-content-between align-items-center">
              <a href="#" class="text-success text-decoration-none">View Details</a>
              <i class="fas fa-circle"></i>
            </div>
          </div>
        </div>

        <!-- Card 8: Cancelled Bookings -->
        <div class="col-md-3 mb-4">
          <div class="card text-white bg-danger h-100">
            <div class="card-body d-flex align-items-center">
              <i class="fas fa-book fa-3x me-3"></i>
              <div>
                <h3 class="mb-0">0</h3>
                <p class="mb-0">Cancelled Bookings</p>
              </div>
            </div>
            <div class="card-footer bg-white text-danger d-flex justify-content-between align-items-center">
              <a href="#" class="text-danger text-decoration-none">View Details</a>
              <i class="fas fa-circle"></i>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>

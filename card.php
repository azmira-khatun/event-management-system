<?php
// config.php include করুন (database connection এর জন্য)
include("config.php");

// =====================
// Booking Count Queries
// =====================

// মোট কতগুলো booking হয়েছে
$total_booking_q = $conn->query("SELECT COUNT(*) AS total FROM booking");
$total_booking = $total_booking_q->fetch_assoc()['total'];

// নতুন booking (status = 'new')
$new_booking_q = $conn->query("SELECT COUNT(*) AS total FROM booking WHERE status='new'");
$new_booking = $new_booking_q->fetch_assoc()['total'];

// Confirmed booking (status = 'confirmed')
$confirmed_booking_q = $conn->query("SELECT COUNT(*) AS total FROM booking WHERE status='confirmed'");
$confirmed_booking = $confirmed_booking_q->fetch_assoc()['total'];

// Cancelled booking (status = 'cancelled')
$cancelled_booking_q = $conn->query("SELECT COUNT(*) AS total FROM booking WHERE status='cancelled'");
$cancelled_booking = $cancelled_booking_q->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <!-- Bootstrap CSS + Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
<div class="container mt-5">
  <div class="row">

    <!-- Card 1: Total Booking -->
    <div class="col-md-3 mb-4">
      <div class="card text-white bg-warning h-100">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-book fa-3x me-3"></i>
          <div>
            <h3 class="mb-0"><?php echo $total_booking; ?></h3>
            <p class="mb-0">Total Bookings</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2: New Booking -->
    <div class="col-md-3 mb-4">
      <div class="card text-white bg-primary h-100">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-book fa-3x me-3"></i>
          <div>
            <h3 class="mb-0"><?php echo $new_booking; ?></h3>
            <p class="mb-0">New Booking</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3: Confirmed Booking -->
    <div class="col-md-3 mb-4">
      <div class="card text-white bg-success h-100">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-book fa-3x me-3"></i>
          <div>
            <h3 class="mb-0"><?php echo $confirmed_booking; ?></h3>
            <p class="mb-0">Confirmed Booking</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 4: Cancelled Booking -->
    <div class="col-md-3 mb-4">
      <div class="card text-white bg-danger h-100">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-book fa-3x me-3"></i>
          <div>
            <h3 class="mb-0"><?php echo $cancelled_booking; ?></h3>
            <p class="mb-0">Cancelled Bookings</p>
          </div>
        </div>
      </div>
    </div>



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
          <a href="#">View Details</a>
          <i class="fas fa-plus"></i>
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
</div>
</body>
</html>


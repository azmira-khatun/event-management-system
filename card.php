<?php
include("config.php");

// =====================
// Booking Count Queries
// =====================
$total_booking_q = $conn->query("SELECT COUNT(*) AS total FROM booking");
$total_booking = 0;
if($total_booking_q){
    $total_booking = $total_booking_q->fetch_assoc()['total'];
}
$new_booking = $total_booking;  
$confirmed_booking = 0;
$cancelled_booking = 0;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body style="margin:0; padding:0; font-family:Arial, sans-serif;">

<!-- Wrapper -->
<div style="display:flex; min-height:100vh;">

    <!-- Sidebar -->
    <div style="width:220px; background-color:#343a40; color:white; padding:20px;">
        <h3 style="margin-bottom:20px;">Dashboard Menu</h3>
        <ul style="list-style:none; padding-left:0;">
            <li style="margin-bottom:10px;"><a href="#" style="color:white; text-decoration:none;">Home</a></li>
            <li style="margin-bottom:10px;"><a href="#" style="color:white; text-decoration:none;">Booking</a></li>
            <li style="margin-bottom:10px;"><a href="#" style="color:white; text-decoration:none;">Events</a></li>
            <li style="margin-bottom:10px;"><a href="#" style="color:white; text-decoration:none;">Users</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
  <div class="row justify-content-center">

    <!-- Total Bookings -->
    <div class="col-lg-3 col-md-4 col-sm-6" style="flex:1; min-width:240px; max-width:260px; margin-bottom:15px;margin-top:45px;">
      <div class="card text-white bg-warning h-100" style="min-height:100px; border-radius:0.75rem;">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-book fa-3x me-3"></i>
          <div>
            <h3 class="mb-0"><?php echo $total_booking; ?></h3>
            <p class="mb-0">Total Bookings</p>
          </div>
        </div>
      </div>
    </div>

    <!-- New Booking -->
    <div class="col-lg-3 col-md-4 col-sm-6" style="flex:1; min-width:240px; max-width:260px; margin-bottom:15px;margin-top:45px;">
      <div class="card text-white bg-primary h-100" style="min-height:100px; border-radius:0.75rem;">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-file-alt fa-3x me-3"></i>
          <div>
            <h3 class="mb-0"><?php echo $new_booking; ?></h3>
            <p class="mb-0">New Booking</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Confirmed Booking -->
    <div class="col-lg-3 col-md-4 col-sm-6" style="flex:1; min-width:240px; max-width:260px; margin-bottom:15px; margin-top:45px;">
      <div class="card text-white bg-success h-100" style="min-height:100px; border-radius:0.75rem;">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-check-circle fa-3x me-3"></i>
          <div>
            <h3 class="mb-0"><?php echo $confirmed_booking; ?></h3>
            <p class="mb-0">Confirmed Booking</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Cancelled Booking -->
    <div class="col-lg-3 col-md-4 col-sm-6" style="flex:1; min-width:240px; max-width:260px; margin-bottom:15px; margin-top:45px;">
      <div class="card text-white bg-danger h-100" style="min-height:100px; border-radius:0.75rem;">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-times-circle fa-3x me-3"></i>
          <div>
            <h3 class="mb-0"><?php echo $cancelled_booking; ?></h3>
            <p class="mb-0">Cancelled Booking</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Listed Categories -->
    <div class="col-lg-3 col-md-4 col-sm-6" style="flex:1; min-width:240px; max-width:260px; margin-bottom:15px;">
      <div class="card text-white bg-primary h-100" style="min-height:100px; border-radius:0.75rem;">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-list fa-3x me-3"></i>
          <div>
            <h3 class="mb-0">7</h3>
            <p class="mb-0">Listed Categories</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Sponsors -->
    <div class="col-lg-3 col-md-4 col-sm-6" style="flex:1; min-width:240px; max-width:260px; margin-bottom:15px;">
      <div class="card text-white bg-success h-100" style="min-height:100px; border-radius:0.75rem;">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-server fa-3x me-3"></i>
          <div>
            <h3 class="mb-0">4</h3>
            <p class="mb-0">Sponsors</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Events -->
    <div class="col-lg-3 col-md-4 col-sm-6" style="flex:1; min-width:240px; max-width:260px; margin-bottom:15px;">
      <div class="card text-white bg-warning h-100" style="min-height:100px; border-radius:0.75rem;">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-calendar fa-3x me-3"></i>
          <div>
            <h3 class="mb-0">2</h3>
            <p class="mb-0">Total Events</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Users -->
    <div class="col-lg-3 col-md-4 col-sm-6" style="flex:1; min-width:240px; max-width:260px; margin-bottom:15px;">
      <div class="card text-white bg-danger h-100" style="min-height:100px; border-radius:0.75rem;">
        <div class="card-body d-flex align-items-center">
          <i class="fas fa-users fa-3x me-3"></i>
          <div>
            <h3 class="mb-0">2</h3>
            <p class="mb-0">Total Reg. Users</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


        </div> <!-- container -->
    </div> <!-- main content -->

</div> <!-- wrapper -->
</body>
</html>

<?php
include("config.php"); // Database connection

$msg = "";

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $rent = $_POST['rent'];
    $description = $_POST['description'];

    if(empty($name) || empty($location) || empty($capacity) || empty($rent)){
        $msg = "<div class='alert alert-danger'>Please fill all required fields!</div>";
    } else {
        $sql = "INSERT INTO venue (name, location, capacity, rent, description) 
                VALUES ('$name', '$location', '$capacity', '$rent', '$description')";
        $result = $conn->query($sql);

        if($result){
            $msg = "<div class='alert alert-success'>Venue added successfully!</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
}
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Venue</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Venue</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Venue Form</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Venue Details</h3>
          </div>

          <div class="ftitle text-center">
            <h4><?php echo isset($msg)?$msg:"Fill Venue Details Below" ?></h4>
          </div>

          <form action="" method="post">
            <div class="card-body">

              <div class="form-group">
                <label for="name">Venue Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter venue name">
              </div>

              <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
              </div>

              <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Enter capacity">
              </div>

              <div class="form-group">
                <label for="rent">Rent (TK)</label>
                <input type="number" class="form-control" id="rent" name="rent" placeholder="Enter rent">
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary">Add Venue</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>
</div>

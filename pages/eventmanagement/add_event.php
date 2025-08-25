<?php
include("config.php"); // Database connection

$msg = "";

if(isset($_POST['submit'])){
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $venue_id = $_POST['venue_id'];

    $sql = "INSERT INTO event(event_name, description, type, date, venue_id)
            VALUES ('$event_name','$description','$type','$date','$venue_id')";

    if($conn->query($sql) === TRUE){
        $msg = "Event Added Successfully";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1>Add Event</h1></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Event</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header bg-primary text-white"><h3 class="card-title">Event Form</h3></div>

      <div class="card-body">
        <div class="card card-primary">
          <div class="card-header"><h3 class="card-title">Quick Example</h3></div>
          <div class="ftitle text-center">
            <h4><?php echo isset($msg)?$msg:"Event Registration Form" ?></h4>
          </div>

          <form action="#" method="post">
            <div class="card-body">

              <div class="form-group">
                <label for="event_name">Event Name</label>
                <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Enter Event Name" required>
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="4" required></textarea>
              </div>

              <div class="form-group">
                <label for="type">Event Type</label>
                <select class="form-control" id="type" name="type" required>
                  <option value="">-- Select Event Type --</option>
                  <option value="Wedding">Wedding</option>
                  <option value="Conference">Conference</option>
                  <option value="Birthday">Birthday</option>
                  <option value="Seminar">Seminar</option>
                  <option value="Other">Other</option>
                </select>
              </div>

              <div class="form-group">
                <label for="date">Event Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>

              <div class="form-group">
                <label for="venue_id">Select Venue</label>
                <select class="form-control" id="venue_id" name="venue_id" required>
                  <option value="">-- Select Venue --</option>
                  <?php
                  $res = $conn->query("SELECT id, name FROM venue");
                  while($row = $res->fetch_assoc()){
                      echo "<option value='".$row['id']."'>".$row['name']."</option>";
                  }
                  ?>
                </select>
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-success" name="submit">Add Event</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>
</div>

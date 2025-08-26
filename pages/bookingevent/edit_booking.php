<?php
include("config.php");

$msg = "";

// URL থেকে id আনা
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// যদি form submit হয় তাহলে update হবে
if (isset($_POST['update'])) {
    $event_id = intval($_POST['event_id']);
    $venue_id = intval($_POST['venue_id']);
    $date = $conn->real_escape_string($_POST['date']);
    $customer_name = $conn->real_escape_string($_POST['customer_name']);
    $gmail = $conn->real_escape_string($_POST['gmail']);
    $contact_number = $conn->real_escape_string($_POST['contact_number']);
    $address = $conn->real_escape_string($_POST['address']);

    $sql = "UPDATE booking 
            SET event_id='$event_id', venue_id='$venue_id', date='$date',
                customer_name='$customer_name', gmail='$gmail',
                contact_number='$contact_number', address='$address'
            WHERE id='$id'";

    if ($conn->query($sql)) {
        $msg = "<div class='alert alert-success'>Booking updated successfully!</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// booking info আনা
$sql = "SELECT * FROM booking WHERE id=$id";
$booking = $conn->query($sql)->fetch_assoc();

// Event list আনা
$events = $conn->query("SELECT id, event_name FROM event");

// Venue list আনা
$venues = $conn->query("SELECT id, name FROM venue");
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Booking</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <?php echo $msg; ?>

        <?php if ($booking): ?>
        <form method="post">
          <div class="form-group">
            <label>Event</label>
            <select name="event_id" class="form-control" required>
              <?php while($e = $events->fetch_assoc()): ?>
                <option value="<?php echo $e['id']; ?>" 
                  <?php if ($e['id'] == $booking['event_id']) echo "selected"; ?>>
                  <?php echo htmlspecialchars($e['event_name']); ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Venue</label>
            <select name="venue_id" class="form-control" required>
              <?php while($v = $venues->fetch_assoc()): ?>
                <option value="<?php echo $v['id']; ?>" 
                  <?php if ($v['id'] == $booking['venue_id']) echo "selected"; ?>>
                  <?php echo htmlspecialchars($v['name']); ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control" 
                   value="<?php echo htmlspecialchars($booking['date']); ?>" required>
          </div>

          <div class="form-group">
            <label>Customer Name</label>
            <input type="text" name="customer_name" class="form-control" 
                   value="<?php echo htmlspecialchars($booking['customer_name']); ?>" required>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="gmail" class="form-control" 
                   value="<?php echo htmlspecialchars($booking['gmail']); ?>" required>
          </div>

          <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="contact_number" class="form-control" 
                   value="<?php echo htmlspecialchars($booking['contact_number']); ?>" required>
          </div>

          <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control" required><?php echo htmlspecialchars($booking['address']); ?></textarea>
          </div>

          <button type="submit" name="update" class="btn btn-success">Update</button>
          <a href="home.php?page=all_bookings" class="btn btn-secondary">Back</a>
        </form>
        <?php else: ?>
          <div class="alert alert-danger">Booking not found.</div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

<?php
include("config.php");

$msg = "";

// Delete action same page
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($conn->query("DELETE FROM booking WHERE id=$id")) {
        $msg = "<div class='alert alert-success'>Booking deleted successfully!</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error deleting booking!</div>";
    }
}

// সব বুকিং আনা
$sql = "SELECT b.id, b.customer_name, b.gmail, b.contact_number, b.address, b.date,
               e.event_name, v.name AS venue_name
        FROM booking b
        JOIN event e ON b.event_id = e.id
        JOIN venue v ON b.venue_id = v.id
        ORDER BY b.id DESC";
$bookings = $conn->query($sql);
?>

<div class="content-wrapper">
  <section class="content-header"><h1>All Bookings</h1></section>
  <section class="content">
    <div class="card">
      <div class="card-body">

        <?php echo $msg; ?>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Event</th>
              <th>Venue</th>
              <th>Date</th>
              <th>Customer</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($bookings->num_rows > 0): ?>
              <?php while($row = $bookings->fetch_assoc()): ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo htmlspecialchars($row['event_name']); ?></td>
                  <td><?php echo htmlspecialchars($row['venue_name']); ?></td>
                  <td><?php echo htmlspecialchars($row['date']); ?></td>
                  <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                  <td><?php echo htmlspecialchars($row['gmail']); ?></td>
                  <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                  <td><?php echo htmlspecialchars($row['address']); ?></td>
                  <td>
                    <!-- <a href="view_booking.php?delete=<?php echo $row['id']; ?>" 
                       onclick="return confirm('Are you sure to delete this booking?')" 
                       class="btn btn-sm btn-danger">Delete</a>
                  </td>
                  <td> -->
   <a href="edit_booking.php?id=<?php echo $row['id']; ?>" 
      class="btn btn-primary btn-sm">
      Edit
   </a>
   <a href="delete_booking.php?id=<?php echo $row['id']; ?>" 
      class="btn btn-danger btn-sm"
      onclick="return confirm('Are you sure you want to delete this booking?');">
      Delete
   </a>
</td>

                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr><td colspan="9" class="text-center">No bookings found</td></tr>
            <?php endif; ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
</div>

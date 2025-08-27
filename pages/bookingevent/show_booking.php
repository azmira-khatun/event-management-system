<?php
include("config.php");

$msg = "";

// যদি delete form থেকে আসে তাহলে ডিলিট হবে
if (isset($_POST['btnDelete'])) {
  $id = intval($_POST['txtId']);
  if ($conn->query("DELETE FROM booking WHERE id=$id")) {
    $msg = "<div class='alert alert-success'>Booking deleted successfully!</div>";
  } else {
    $msg = "<div class='alert alert-danger'>Error deleting booking: " . $conn->error . "</div>";
  }
}

// সব বুকিং আনা (delete হোক বা না হোক সবসময় নতুন query চলবে)
$sql = "SELECT b.id, b.customer_name, b.gmail, b.contact_number, b.address, b.date,
               e.event_name, v.name AS venue_name
        FROM booking b
        JOIN event e ON b.event_id = e.id
        JOIN venue v ON b.venue_id = v.id
        ORDER BY b.id DESC";
$bookings = $conn->query($sql);
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>All Bookings</h1>
  </section>
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
            <?php if ($bookings && $bookings->num_rows > 0): ?>
              <?php while ($row = $bookings->fetch_assoc()): ?>
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
                    <div class="d-flex">
                      <!-- Delete Form -->
                      <form action="" method="post"
                        onsubmit="return confirm('Are you sure you want to delete this booking?');" class="mr-1">
                        <input type="hidden" name="txtId" value="<?php echo $row['id']; ?>" />
                        <button type="submit" name="btnDelete" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                      <!-- Edit Button -->
                      <!-- <a href='home.php?page=3&id=$id' class='btn btn-primary btn-sm'> -->
                      <a href="home.php?page=12&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="9" class="text-center">No bookings found</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
</div>
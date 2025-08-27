<?php
include("config.php");

// Delete Booking
$msg = "";
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($conn->query("DELETE FROM booking WHERE id=$id")) {
        $msg = "<div class='alert alert-success'>Booking deleted successfully!</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error deleting booking: " . $conn->error . "</div>";
    }
}

// Fetch all bookings
$sql = "SELECT b.*, e.event_name, v.name AS venue_name 
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
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Event</th>
                            <th>Venue</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                           <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($bookings && $bookings->num_rows > 0): ?>
                            <?php while ($row = $bookings->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= htmlspecialchars($row['event_name']); ?></td>
                                    <td><?= htmlspecialchars($row['venue_name']); ?></td>
                                    <td><?= htmlspecialchars($row['date']); ?></td>
                                    <td><?= htmlspecialchars($row['customer_name']); ?></td>
                                    <td><?= htmlspecialchars($row['gmail']); ?></td>
                                    <td><?= htmlspecialchars($row['contact_number']); ?></td>
                                    <td><?= htmlspecialchars($row['address']); ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="edit_booking.php?id=<?= $row['id']; ?>"
                                                class="btn btn-primary btn-sm mr-1">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="?delete=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this booking?');">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center">No bookings found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>
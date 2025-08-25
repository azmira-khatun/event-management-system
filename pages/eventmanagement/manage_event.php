<?php
include("config.php");

// Redirect if not connected/session
if (!isset($conn)) {
    header("location:login.php");
    exit();
}

// Delete event
$r = "";
if (isset($_POST["btnDelete"])) {
    $e_id = mysqli_real_escape_string($conn, $_POST["txtId"]);
    $sql = "DELETE FROM event WHERE id='$e_id'";
    if ($conn->query($sql) === TRUE) {
        $r = "<div class='alert alert-success'>Event deleted successfully.</div>";
    } else {
        $r = "<div class='alert alert-danger'>Error deleting record: " . $conn->error . "</div>";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Events</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <?php echo $r; ?>

                <table class="table table-striped table-bordered">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>#ID</th>
                            <th>Event Name</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $events = $conn->query("
                            SELECT e.id, e.event_name, e.type, e.date, v.name AS venue_name
                            FROM event e
                            JOIN venue v ON e.venue_id = v.id
                            ORDER BY e.id DESC
                        ");

                        if ($events) {
                            while ($row = $events->fetch_assoc()) {
                                $id = $row['id'];
                                $ename = $row['event_name'];
                                $etype = $row['type'];
                                $edate = $row['date'];
                                $venue = $row['venue_name'];

                                echo "<tr>
                                    <td>$id</td>
                                    <td>$ename</td>
                                    <td>$etype</td>
                                    <td>$edate</td>
                                    <td>$venue</td>
                                    <td>
                                        <div class='d-flex'>
                                            <form action='' method='post' onsubmit='return confirm(\"Are you sure you want to delete this event?\");'>
                                                <input type='hidden' name='txtId' value='$id' />
                                                <button type='submit' name='btnDelete' class='btn btn-danger btn-sm mr-1'>
                                                    <i class='fas fa-trash'></i>
                                                </button>
                                            </form>
                                            <a href='home.php?page=12&id=$id' class='btn btn-primary btn-sm'>
                                                <i class='fas fa-edit'></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Query failed: " . $conn->error . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

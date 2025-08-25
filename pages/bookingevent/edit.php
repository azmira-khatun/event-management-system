<?php
include("config.php");

$msg = "";
$id = 0;
$event_name = "";
$description = "";
$type = "";
$date = "";
$venue_id = "";

// Get event data
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT event_name, description, type, date, venue_id FROM event WHERE id='$id'";
    $res = $conn->query($sql);
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $event_name = $row['event_name'];
        $description = $row['description'];
        $type = $row['type'];
        $date = $row['date'];
        $venue_id = $row['venue_id'];
    } else {
        $msg = "<div class='alert alert-danger'>Event not found.</div>";
    }
}

// Update event
if (isset($_POST['submit'])) {
    $id_update = intval($_POST['id']);
    $event_name_update = mysqli_real_escape_string($conn, $_POST['event_name']);
    $description_update = mysqli_real_escape_string($conn, $_POST['description']);
    $type_update = mysqli_real_escape_string($conn, $_POST['type']);
    $date_update = $_POST['date'];
    $venue_id_update = intval($_POST['venue_id']);

    $sql_update = "UPDATE event SET 
                       event_name='$event_name_update',
                       description='$description_update',
                       type='$type_update',
                       date='$date_update',
                       venue_id='$venue_id_update'
                   WHERE id='$id_update'";

    if ($conn->query($sql_update) === TRUE) {
        $msg = "<div class='alert alert-success'>Event updated successfully.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Event</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <?php echo $msg; ?>

                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                    <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" class="form-control" name="event_name" value="<?php echo htmlspecialchars($event_name); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="4" required><?php echo htmlspecialchars($description); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Event Type</label>
                        <select class="form-control" name="type" required>
                            <option value="">-- Select Type --</option>
                            <option value="Wedding" <?php if($type=='Wedding') echo 'selected'; ?>>Wedding</option>
                            <option value="Conference" <?php if($type=='Conference') echo 'selected'; ?>>Conference</option>
                            <option value="Birthday" <?php if($type=='Birthday') echo 'selected'; ?>>Birthday</option>
                            <option value="Seminar" <?php if($type=='Seminar') echo 'selected'; ?>>Seminar</option>
                            <option value="Other" <?php if($type=='Other') echo 'selected'; ?>>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Event Date</label>
                        <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($date); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Select Venue</label>
                        <select class="form-control" name="venue_id" required>
                            <option value="">-- Select Venue --</option>
                            <?php
                            $res = $conn->query("SELECT id, name FROM venue");
                            while($row = $res->fetch_assoc()){
                                $selected = ($row['id'] == $venue_id) ? "selected" : "";
                                echo "<option value='".$row['id']."' $selected>".$row['name']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Update Event</button>
                    <a href="events_table_card.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </section>
</div>

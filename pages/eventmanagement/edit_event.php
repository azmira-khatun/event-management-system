<?php
include("config.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$msg = "";
$event_name = "";
$type = "";
$date = "";
$venue_id = "";

// Fetch venue list for dropdown
$venue_res = $conn->query("SELECT id, name FROM venue");

// Fetch event details
if($id > 0){
    $res = $conn->query("SELECT * FROM event WHERE id='$id'");
    if($res && $res->num_rows > 0){
        $row = $res->fetch_assoc();
        $event_name = $row['event_name'];
        $type = $row['type'];
        $date = $row['date'];
        $venue_id = $row['venue_id'];
    } else {
        $msg = "<div class='alert alert-danger'>Event not found.</div>";
    }
}

// Update event
if(isset($_POST['submit'])){
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $venue_id = intval($_POST['venue_id']);

    $sql = "UPDATE event SET event_name='$event_name', type='$type', date='$date', venue_id='$venue_id' WHERE id='$id'";
    if($conn->query($sql) === TRUE){
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
                <form method="post">
                    <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" class="form-control" name="event_name" value="<?php echo htmlspecialchars($event_name); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" value="<?php echo htmlspecialchars($type); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($date); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Venue</label>
                        <select class="form-control" name="venue_id" required>
                            <option value="">-- Select Venue --</option>
                            <?php
                            if($venue_res->num_rows > 0){
                                while($venue = $venue_res->fetch_assoc()){
                                    $selected = ($venue['id'] == $venue_id) ? "selected" : "";
                                    echo "<option value='{$venue['id']}' $selected>{$venue['name']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <a href="home.php?page=11" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </section>
</div>

<?php
include("config.php");

// Redirect if not connected/session
if (!isset($conn)) {
    header("location:login.php");
    exit();
}

$msg = "";
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Get venue data for pre-filling
$name = $location = $capacity = $rent = $description = "";

if ($id > 0) {
    $sql = "SELECT * FROM venue WHERE id=$id";
    $res = $conn->query($sql);
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $name = $row['name'];
        $location = $row['location'];
        $capacity = $row['capacity'];
        $rent = $row['rent'];
        $description = $row['description'];
    } else {
        $msg = "<div class='alert alert-danger'>Venue not found.</div>";
    }
}

// Update venue
if (isset($_POST['submit'])) {
    $name_update = mysqli_real_escape_string($conn, $_POST['name']);
    $location_update = mysqli_real_escape_string($conn, $_POST['location']);
    $capacity_update = mysqli_real_escape_string($conn, $_POST['capacity']);
    $rent_update = mysqli_real_escape_string($conn, $_POST['rent']);
    $description_update = mysqli_real_escape_string($conn, $_POST['description']);

    $sql_update = "UPDATE venue SET 
                       name='$name_update', 
                       location='$location_update', 
                       capacity='$capacity_update', 
                       rent='$rent_update', 
                       description='$description_update'
                   WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        $msg = "<div class='alert alert-success'>Venue updated successfully.</div>";
        // update form fields with new values
        $name = $name_update;
        $location = $location_update;
        $capacity = $capacity_update;
        $rent = $rent_update;
        $description = $description_update;
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Venue</h1>
    </section>

    <section class="content">
        <div class="card" style="max-width:600px; margin:auto;">
            <div class="card-body">
                <?php echo $msg; ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label>Venue Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" value="<?php echo htmlspecialchars($location); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Capacity</label>
                        <input type="number" class="form-control" name="capacity" value="<?php echo htmlspecialchars($capacity); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Rent (TK)</label>
                        <input type="number" class="form-control" name="rent" value="<?php echo htmlspecialchars($rent); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3"><?php echo htmlspecialchars($description); ?></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <a href="home.php?page=9" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </section>
</div>

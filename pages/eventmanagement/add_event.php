<?php
include("config.php"); // Database connection

$msg = "";

if (isset($_POST['submit'])) {
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $venue_id = $_POST['venue_id'];

    // Image upload process
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . '/uploads/';
        if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);

        $tmpName = $_FILES['event_image']['tmp_name'];
        $originalName = basename($_FILES['event_image']['name']);
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($extension, $allowedExt)) {
            $newFileName = uniqid('evt_', true) . '.' . $extension;
            $targetFile = $targetDir . $newFileName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                // Save image path in the database
                $image = 'uploads/' . $newFileName;

                // Insert event into the database
                $sql = "INSERT INTO event (event_name, description, type, date, venue_id, image)
                        VALUES ('$event_name', '$description', '$type', '$date', '$venue_id', '$image')";

                if ($conn->query($sql) === TRUE) {
                    $msg = "Event and image successfully saved!";
                } else {
                    $msg = "Error: " . $conn->error;
                }
            } else {
                $msg = "Failed to move uploaded file.";
            }
        } else {
            $msg = "Invalid file type. Only JPG, PNG, GIF allowed.";
        }
    } else {
        $msg = "No image uploaded or upload error.";
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
                        <h4><?php echo isset($msg) ? $msg : "Event Registration Form"; ?></h4>
                    </div>

                    <form action="#" method="post" enctype="multipart/form-data">
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
                                    while ($row = $res->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="event_image">Event Image</label>
                                <input type="file" class="form-control" id="event_image" name="event_image" accept="image/*" required>
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

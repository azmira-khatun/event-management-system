<?php
include("config.php");

// Redirect if not connected/session
if (!isset($conn)) {
    header("location:login.php");
    exit();
}

// GET থেকে event id নিন
$event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$event_name = $venue = $date = "";

// Event info fetch করুন
if ($event_id > 0) {
    $sql = "
        SELECT e.event_name, e.date, v.name AS venue_name
        FROM event e
        JOIN venue v ON e.venue_id = v.id
        WHERE e.id = '$event_id'
        LIMIT 1
    ";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $event_name = $row['event_name'];
        $venue = $row['name'];
        $date = $row['date'];
    }
}

// Booking submit handle
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);

    $sql = "INSERT INTO booking (event_id, customer_name, customer_email) 
            VALUES ('$event_id', '$customer_name', '$customer_email')";

    if ($conn->query($sql) === TRUE) {
        $msg = "<div class='alert alert-success'>Booking confirmed!</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Booking Form</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <?php echo $msg; ?>

                <form action="" method="post">

                    <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($event_name); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Venue</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($venue); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($date); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Your Email</label>
                        <input type="email" name="customer_email" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Confirm Booking</button>
                </form>
            </div>
        </div>
    </section>
</div>

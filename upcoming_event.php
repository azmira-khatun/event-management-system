<div>
    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" />

<style>
.upcoming-events {
    margin: 20px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.event {
    margin-bottom: 15px;
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.event h2 {
    font-size: 1.5em;
    margin: 0;
}

.event p {
    margin: 5px 0;
}
</style>
<?php
    // require "../config/db.php";
    $query = "SELECT * FROM booking ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    ?>


<?php
// Database connection
$host = 'localhost'; // Your database host
$user = 'root';      // Your database username
$pass = '';          // Your database password
$dbname = 'event-ms'; // Your database name

$conn = new mysqli($host, $user, $pass, $dbname);



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch upcoming events
$query = "SELECT * FROM events WHERE start_datetime >= NOW() ORDER BY start_datetime ASC LIMIT 5";
$result = $conn->query($query);

// Check if there are events
if ($result->num_rows > 0) {
    echo '<div class="upcoming-events">';
    while ($event = $result->fetch_assoc()) {
        echo '<div class="event">';
        echo '<h2>' . htmlspecialchars($event['title']) . '</h2>';
        echo '<p>' . nl2br(htmlspecialchars($event['description'])) . '</p>';
        echo '<p><strong>Start:</strong> ' . date('F j, Y, g:i a', strtotime($event['start_datetime'])) . '</p>';
        echo '<p><strong>End:</strong> ' . date('F j, Y, g:i a', strtotime($event['end_datetime'])) . '</p>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>No upcoming events.</p>';
}

// Close connection
$con->close();
?>

<?php
include("config.php");

// Redirect if not connected/session
if (!isset($conn)) {
    header("location:login.php");
    exit();
}

// Delete venue
$msg = "";
if (isset($_POST["btnDelete"])) {
    $v_id = mysqli_real_escape_string($conn, $_POST["txtId"]);
    $sql = "DELETE FROM venue WHERE id='$v_id'";
    if ($conn->query($sql) === TRUE) {
        $msg = "<div class='alert alert-success'>Venue deleted successfully.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error deleting record: " . $conn->error . "</div>";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Venues</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <?php echo $msg; ?>

                <table class="table table-striped table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Capacity</th>
                            <th>Rent (TK)</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $venues = $conn->query("SELECT id, name, location, capacity, rent, description FROM venue ORDER BY id DESC");
                        if ($venues) {
                            while (list($id, $name, $location, $capacity, $rent, $description) = $venues->fetch_row()) {
                                echo "<tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$location</td>
                                    <td>$capacity</td>
                                    <td>$rent</td>
                                    <td>$description</td>
                                    <td>
                                        <div class='d-flex'>
                                            <form action='' method='post' onsubmit='return confirm(\"Are you sure you want to delete this venue?\");'>
                                                <input type='hidden' name='txtId' value='$id' />
                                                <button type='submit' name='btnDelete' class='btn btn-danger btn-sm mr-1'>
                                                    <i class='fas fa-trash'></i>
                                                </button>
                                            </form>
                                            <a href='home.php?page=9' class='btn btn-primary btn-sm'>
                                                <i class='fas fa-edit'></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Query failed: " . $conn->error . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

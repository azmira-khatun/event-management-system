<?php
include("config.php");

// Redirect if not connected/session
if (!isset($conn)) {
    header("location:login.php");
    exit();
}

// Delete user
$r = "";
if (isset($_POST["btnDelete"])) {
    $u_id = mysqli_real_escape_string($conn, $_POST["txtId"]);
    $sql = "DELETE FROM users WHERE id='$u_id'";
    if ($conn->query($sql) === TRUE) {
        $r = "<div class='alert alert-success'>User deleted successfully.</div>";
    } else {
        $r = "<div class='alert alert-danger'>Error deleting record: " . $conn->error . "</div>";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Users</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <?php echo $r; ?>

                <table class="table table-striped table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <!-- <th>Role Name</th> -->

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = $conn->query("SELECT id, firstname, lastname, email password FROM users");
                        if ($users) {
                            while (list($id, $fname, $lname, $email) = $users->fetch_row()) {
                                echo "<tr>
                                    <td>$id</td>
                                    <td>$fname</td>
                                    <td>$lname</td>
                                    <td>$email</td>

                                    <td>
                                        <div class='d-flex'>
                                            <form action='' method='post' onsubmit='return confirm(\"Are you sure you want to delete this user?\");'>
                                                <input type='hidden' name='txtId' value='$id' />
                                                <button type='submit' name='btnDelete' class='btn btn-danger btn-sm mr-1'>
                                                    <i class='fas fa-trash'></i>
                                                </button>
                                            </form>
                                            <a href='home.php?page=3&id=$id' class='btn btn-primary btn-sm'>
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

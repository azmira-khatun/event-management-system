<?php
include("config.php");

// Redirect if not connected/session
if (!isset($conn)) {
    header("location:login.php");
    exit();
}

$msg = "";
$id = 0;
$firstname = "";
$lastname = "";
$email = "";
$password = "";

// Get user data
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT firstname, lastname, email, password FROM users WHERE id='$id'";
    $res = $conn->query($sql);
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $password = $row['password']; // plain text
    } else {
        $msg = "<div class='alert alert-danger'>User not found.</div>";
    }
}

// Update user
if (isset($_POST['submit'])) {
    $id_update = mysqli_real_escape_string($conn, $_POST['id']);
    $firstname_update = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname_update = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email_update = mysqli_real_escape_string($conn, $_POST['email']);
    $password_update = mysqli_real_escape_string($conn, $_POST['password']);

    $sql_update = "UPDATE users SET 
                       firstname='$firstname_update', 
                       lastname='$lastname_update', 
                       email='$email_update', 
                       password='$password_update' 
                   WHERE id='$id_update'";

    if ($conn->query($sql_update) === TRUE) {
        $msg = "<div class='alert alert-success'>User updated successfully.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit User</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <?php echo $msg; ?>

                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="<?php echo htmlspecialchars($password); ?>" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <a href="home.php?page=2" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </section>
</div>

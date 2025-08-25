<!-- Content Wrapper. Contains page content -->
<?php
// include("config.php");
if (!isset($conn)) {
	header("location:login.php");
}
  if (isset($_POST['submit'])) {

    $first_name = $_POST['firstname'];

    $last_name = $_POST['lastname'];

    $email = $_POST['email'];

    $password = $_POST['password'];
    $role = $_POST['role'];


    $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`,`role_name`) 

           VALUES ('$first_name','$last_name','$email','$password','$role')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      $r = "User Added Successfully";


    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    }

    $conn->close();

  } 

?> 



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
          </div>
          <div class="ftitle text-center"> 
			<h4><?php echo isset($r)?$r:"Users Registration Form" ?></h4>
		</div>
          <!-- /.card-header -->
          <!-- form start -->
     <form action="#" method="post">
                  <div class="card-body">

              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="firstname">
              </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Last name" name="lastname">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
              </div>
            <div class="form-group">
   <label for="role">Role</label>
   <select name="role" id="role" class="form-control">
      <option value="admin">Admin</option>
      <option value="staff">Staff</option>
   </select>
</div>

            </div>

            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>

      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->




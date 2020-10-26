<?php
include("./php/dbconfig/dbconnection.php");

//------------Add user-------------
if (isset($_POST['upload'])) {
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $user_name = $_POST['user_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $conf_password = $_POST['conf_password'];
  $image = $_FILES['file']['name'];
  $path = '../assets/user/' . $image;

  // Select file type

    $sql_add = "INSERT INTO user(f_name,l_name,username,email,password1,con_password,profile_image) values('$f_name','$l_name','$user_name','$email','$password','$conf_password','$path')";

    // Valid file extensions
    if (mysqli_query($conn, $sql_add)) {
      move_uploaded_file($_FILES['file']['tmp_name'], $path);
      echo '<script>alert("Uploaded")</script>';
      header("location:login.php");
    } else {
      echo '<script>"Error: " . $sql_add . "
      " . mysqli_error($conn)</script>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>

    <!-----Bootstrap CDN---------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!------Fontawesome------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css">

    <!------Custom Css------------>
    <link rel="stylesheet" href="./css/reg.css">
</head>

<body>

    <!------------------Start Create Account Form---------------------->
    <div class="container">
      <div class="row login-figure">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title text-center pb-3">Create Account</h3>
              
              <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="f_name" class="col-sm-4 col-form-label">First Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="f_name" id="f_name" placeholder="First Name" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="l_name" class="col-sm-4 col-form-label">Last Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Last Name" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="user_name" class="col-sm-4 col-form-label">User Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="abcsiu213" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-4 col-form-label" >Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" placeholder="example11@gmail.com" id="email" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-sm-4 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="password"name="password" placeholder="Password" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="conf_password" class="col-sm-4 col-form-label">Confirm Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="conf_password" id="conf_password" placeholder="Re-Enter Password" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="file" class="col-sm-4 col-form-label">Image</label>
                  <div class="col-sm-8">
                    <input type="file" name="file" class="form-control-file" id="file">
                  </div>
                </div>

                <div class="text-center pt-3">
                  <input class="btn btn-primary" name="upload" type="submit" value="Create Account">
                </div>
                <div class="text-center pt-3">
                  <p>Already Have Account <a href="login.php">Log In</a> </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!------------------End Login Form---------------------->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   
    <script src="./js/index.js"></script>

</body>

</html>
<?php
include('dbconnection.php');
$sql_query_show = "SELECT * FROM admin WHERE id = '1'";
$result = mysqli_query($conn, $sql_query_show);
$data = mysqli_fetch_assoc($result);

//----------Account Setting-------------------
if (isset($_POST['account_update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phone_number = $_POST['phone_number'];

    $sql_add = $conn->query("UPDATE admin SET full_name='$name', email='$email', username='$username', phone_number='$phone_number' WHERE id='1'");

    if ($sql_add) {
        header("location:profile.php");
    } else {
        echo '<script>alert("Failed")</script>';
    }
}

//----------Details Setting-------------------
if (isset($_POST['details_update'])) {
    $per_address = $_POST['per_address'];
    $pre_address = $_POST['pre_address'];


    $sql_add = $conn->query("UPDATE admin SET Permanent_Address='$per_address', Present_Address='$pre_address' WHERE id='1'");

    if ($sql_add) {
        header("location:profile.php");
    } else {
        echo '<script>alert("Failed")</script>';
    }
}

//----------Password-------------------
if (isset($_POST['password_update'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password == $confirm_password) {
        $sql_add = $conn->query("UPDATE admin SET admin_password='$new_password' WHERE id='1'");

        if ($sql_add) {
            header("location:profile.php");
        } else {
            echo '<script>alert("Failed")</script>';
        }
    }
    else{
        echo '<script>alert("Confirm Password Did Not Match")</script>';
    }
}


//===============Profile Photo Update=============================
if (isset($_POST['image_update'])) {

    $image = $_FILES['file']['name'];

    $path = '../admin/assets/profile_pic/' . $image;

    // Select file type
    if ($image != null) {
        $sql_update = $conn->query("UPDATE admin SET profile_image = '$path' WHERE id='1'");

        // Valid file extensions
        if ($sql_update) {
            move_uploaded_file($_FILES['file']['tmp_name'], $path);
            header("location:profile.php");
        } else {
            echo '<script>alert("Failed")</script>';
        }
    } else {
        echo '<script>alert("Please Select Image")</script>';
    }
}

?>

<div class="content">
    <div class="container">
        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title ">Account Setting</h5>
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="<?php echo $data['full_name']; ?>" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $data['email']; ?>" name="email">
                    </div>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="username" value="<?php echo $data['username']; ?>" name="username">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" class="form-control" id="phone_number" value="<?php echo $data['phone_number']; ?>" name="phone_number">
                    </div>
                    <input type="submit" class="btn btn-primary float-right" name="account_update" value="update">
                </form>

            </div>
        </div>

        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title">Details</h5>
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="per_address">Permanent Address</label>
                        <input type="text" class="form-control" id="per_address" value="<?php echo $data['Permanent_Address']; ?>" name="per_address">
                    </div>
                    <div class="form-group">
                        <label for="pre_address">Present Address</label>
                        <input type="text" class="form-control" id="pre_address" value="<?php echo $data['Present_Address']; ?>" name="pre_address">
                    </div>
                    <input type="submit" class="btn btn-primary float-right" name="details_update" value="update">
                </form>
            </div>
        </div>

        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title">Password</h5>
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" class="form-control" id="old_password" value="<?php echo $data['admin_password']; ?>" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <input type="submit" class="btn btn-primary float-right" name="password_update" value="update">
                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title">Update Image</h5>
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Update Image</label>
                                <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <input type="submit" class="btn btn-primary float-right mt-2" name="image_update" value="update">
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title">Profile Image</h5>
                        <div class="text-center">
                            <img src="<?php echo $data['profile_image']; ?>" class="img-fluid rounded-circle" style="height: 7.3rem; width:7.3rem;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
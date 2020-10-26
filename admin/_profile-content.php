<?php
include("dbconnection.php");

//---------Delete blog----------------
if (isset($_GET['del_id'])) {
  $idd = $_GET['del_id'];
  $selectSql = "SELECT userid,profile_image FROM user where userid = '$idd'";
  $rsSelect = mysqli_query($conn, $selectSql);
  $getRow = mysqli_fetch_assoc($rsSelect);

  $getIamgeName = $getRow['profile_image'];

  $createDeletePath = $_SERVER['DOCUMENT_ROOT'] . "./assets/user/" . $getIamgeName;

  if (($createDeletePath!=null)) {
    $deleteSql = "DELETE from user where userid = " . $getRow['userid'];
    $rsDelete = mysqli_query($conn, $deleteSql);

    if ($rsDelete) {
      header('location:profile.php?success=true');
      exit();
    }
  }
  else{
    $deleteSql = "DELETE from user where userid = " . $getRow['userid'];
    $rsDelete = mysqli_query($conn, $deleteSql);

    if ($rsDelete) {
      header('location:profile.php?success=true');
      exit();
    }
  } 
}

?>

<div class="content">

<?php
      $sql_show = "SELECT * FROM user";
      $result = mysqli_query($conn, $sql_show);
      $conn->close();
      ?>
      <div class="mt-4">
        <table class="table table-striped table-bordered" style="width: 100%;" id="myTable">
          <thead>
            <tr>
              <th>#</th>
              <th>User ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Number</th>
              <th>Address</th>
              <th>Shipping Address</th>
              <th>Billing Address</th>
              <th>Profile Image</th>
              <th>Reg Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;  // LOOP TILL END OF DATA  
            while ($rows = $result->fetch_assoc()) {
              $i = $i + 1;

            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $rows['userid']; ?></td>
                <td><?php echo $rows['f_name']; ?></td>
                <td><?php echo $rows['l_name']; ?></td>
                <td><?php echo $rows['username']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['phone_number']; ?></td>
                <td><?php echo $rows['address']; ?></td>
                <td><?php echo $rows['shipping_address']; ?></td>
                <td><?php echo $rows['billing_address']; ?></td>
                <td><?php echo $rows['profile_image']; ?></td>
                <td><?php echo $rows['join_date']; ?></td>
                <td>
                  <a href="#"><i class="fas fa-eye"></i></a>
                  <a href="_blog-edit.php?id=<?php echo $rows["userid"] ?>"><i class="fas fa-pencil-alt"></i></a>
                  <a href="?del_id=<?php echo $rows["userid"] ?>"><i class="fas fa-trash-alt text-danger"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>


</div>
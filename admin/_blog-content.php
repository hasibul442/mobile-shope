<?php
include("dbconnection.php");

//------------Add Banner Image-------------
if (isset($_POST['upload'])) {
  $headline = $_POST['headline'];
  $image = $_FILES['file']['name'];
  $path = '../assets/blog/' . $image;
  $blog = $_POST['blog'];
  $link = $_POST['link'];
  // Select file type
  if ($image != null) {
    $sql_add = "INSERT INTO blog(headline,image_path,document,link) values('$headline','$image','$blog','$link')";

    // Valid file extensions
    if (mysqli_query($conn, $sql_add)) {
      move_uploaded_file($_FILES['file']['tmp_name'], $path);
      echo '<script>alert("Uploaded")</script>';
    } else {
      echo '<script>alert("Failed")</script>';
    }
  } else {
    echo '<script>alert("Please Select Image")</script>';
  }
}

//---------Delete blog----------------
if (isset($_GET['del-id'])) {
  $idd = $_GET['del-id'];
  $selectSql = "SELECT id,image_path FROM blog where id = '$idd'";
  $rsSelect = mysqli_query($conn, $selectSql);
  $getRow = mysqli_fetch_assoc($rsSelect);

  $getIamgeName = $getRow['image_path'];

  $createDeletePath = $_SERVER['DOCUMENT_ROOT'] . "/mobile-shope/assets/blog/" . $getIamgeName;

  if (($createDeletePath)) {
    $deleteSql = "DELETE from blog where id = " . $getRow['id'];
    $rsDelete = mysqli_query($conn, $deleteSql);

    if ($rsDelete) {
      header('location:blog.php?success=true');
      exit();
    }
  } else {
    $errorMsg = "Unable to delete Image";
  }
}

?>

<div class="content">
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-all-blog-tab" data-toggle="tab" href="#nav-all-blog" role="tab" aria-controls="nav-all-blog" aria-selected="true">All Blog</a>
      <a class="nav-item nav-link" id="nav-add-blog-photo-tab" data-toggle="tab" href="#nav-add-blog-photo" role="tab" aria-controls="nav-add-blog-photo" aria-selected="false"><i class="fas fa-plus-circle"></i> Add New Blog</a>

    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-all-blog" role="tabpanel" aria-labelledby="nav-all-blog-tab">
      <?php
      $sql_show = "SELECT * FROM blog ORDER BY id ASC ";
      $result = mysqli_query($conn, $sql_show);
      $conn->close();
      ?>
      <div class="mt-4">
        <table class="table table-striped table-bordered" style="width: 100%;" id="myTable">
          <thead>
            <tr>
              <th>#</th>
              <th>ID</th>
              <th>Headline</th>
              <th>Blog</th>
              <th>Image</th>
              <th>link</th>
              <th>Date</th>
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
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['headline']; ?></td>
                <td><?php echo $rows['document']; ?></td>
                <td><?php echo $rows['image_path']; ?></td>
                <td><a href="<?php echo $rows['link']; ?>"><?php echo $rows['link']; ?></a></td>
                <td><?php echo $rows['date']; ?></td>
                <td>
                  <a href="#"><i class="fas fa-eye"></i></a>
                  <a href="_blog-edit.php?id=<?php echo $rows["id"] ?>"><i class="fas fa-pencil-alt"></i></a>
                  <a href="?del-id=<?php echo $rows["id"] ?>"><i class="fas fa-trash-alt text-danger"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>


      </div>
    </div>

    <div class="tab-pane fade" id="nav-add-blog-photo" role="tabpanel" aria-labelledby="nav-add-blog-photo-tab">
      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
          <div class="card mt-4" id="add">
            <div class="card-body"id="add-body">
              <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                  <label for="headline" class="col-sm-2 col-form-label">Headline</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="headline" name="headline">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="image" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" name="file" class="form-control-file" id="image">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="blog" class="col-sm-2 col-form-label">Blog</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="blog" rows="3" name="blog"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="link" class="col-sm-2 col-form-label">Link</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="link" name="link">
                  </div>
                </div>


                <div class="form-group text-center">
                  <input type="submit" name="upload" class="btn btn-success" value="Add Blog">
                </div>

              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
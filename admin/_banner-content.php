<?php
include("dbconnection.php");

//------------Add Banner Image-------------
if (isset($_POST['upload'])) {

  $image = $_FILES['file']['name'];
 
  $path = '../assets/banner/' . $image;
  
  // Select file type
  if ($image != null) {
    $sql_add = $conn->query("INSERT INTO banner(image_path) values('$path')");

    // Valid file extensions
    if ($sql_add) {
      move_uploaded_file($_FILES['file']['tmp_name'], $path);
      echo '<script>alert("Uploaded")</script>';
    } else {
      echo '<script>alert("Failed")</script>';
    }
  } else {
    echo '<script>alert("Please Select Image")</script>';
  }
}

//---------Delete Banner Image----------------
if(isset($_GET['deleteid']))
{
    $idd=$_GET['deleteid'];
    $selectSql = "SELECT id,image_path FROM banner where id = '$idd'";
    $rsSelect = mysqli_query($conn,$selectSql);
    $getRow = mysqli_fetch_assoc($rsSelect);
    
    $getIamgeName = $getRow['image_path'];
    
    $createDeletePath = $_SERVER['DOCUMENT_ROOT']."/mobile-shope/assets/banner/".$getIamgeName;
    
    if(($createDeletePath))
    {
        $deleteSql = "DELETE from banner where id = ".$getRow['id'];
        $rsDelete = mysqli_query($conn, $deleteSql);	
        
        if($rsDelete)
        {
            header('location:banner.php?success=true');
            exit();
        }
    }
    else
    {
        $errorMsg = "Unable to delete Image";
    }
    
}

?>

<div class="content">
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-all-banner-tab" data-toggle="tab" href="#nav-all-banner" role="tab" aria-controls="nav-all-banner" aria-selected="true">All Banner</a>
      <a class="nav-item nav-link" id="nav-add-banner-photo-tab" data-toggle="tab" href="#nav-add-banner-photo" role="tab" aria-controls="nav-add-banner-photo" aria-selected="false"><i class="fas fa-plus-circle"></i> Add Banner</a>

    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-all-banner" role="tabpanel" aria-labelledby="nav-all-banner-tab">
      <?php
      $sql_show = "SELECT * FROM banner ORDER BY id ASC ";
      $result = mysqli_query($conn,$sql_show);
      $conn->close();
      ?>
      <div class="mt-4">
        <table class="table table-striped table-bordered"style="width: 100%;" id="myTable">
          <thead>
            <tr>
              <th>#</th>
              <th>ID</th>
              <th>Image Path</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=0;  // LOOP TILL END OF DATA  
            while ($rows = $result->fetch_assoc()) {
              $i=$i+1;
              
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['image_path']; ?></td>
                <td>
                  <a href="?deleteid=<?php echo $rows["id"]?>"><i class="fas fa-trash-alt text-danger"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="tab-pane fade" id="nav-add-banner-photo" role="tabpanel" aria-labelledby="nav-add-banner-photo-tab">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
          <div class="card mt-4" id="upload-block">
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="File1"><span>Banner Images</span> </label>
                    </div>
                    <div class="col-sm-8">
                      <input type="file" name="file" class="form-control-file" id="File1">
                    </div>
                  </div>
                </div>

                <div class="form-group text-center">
                  <input type="submit" name="upload" class="btn btn-success" value="Upload Image">
                </div>

              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>

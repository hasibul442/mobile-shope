<?php
include("./php/dbconfig/dbconnection.php");
$msg = '';
if (isset($_POST['upload'])) {

  $image = $_FILES['file']['name'];
  $path = '../assets/banner/' . $image;
  // Select file type
  if ($image != null) {
    $sql = $conn->query("INSERT INTO banner(image_path) values('$path')");

    // Valid file extensions
    if ($sql) {
      move_uploaded_file($_FILES['file']['tmp_name'], $path);
      echo '<script>alert("Uploaded")</script>';
    } else {
      echo '<script>alert("Failed")</script>';
    }
  } else {
    echo '<script>alert("Please Select Image")</script>';
  }
}

?>

<div class="content">
  <div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">
      <div class="card" id="upload-block">
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label for="File1"><samp>Banner Images</samp> </label>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('.nav_btn').click(function() {
      $('.mobile_nav_items').toggleClass('active');
    });
  });
</script>



</body>

</html>
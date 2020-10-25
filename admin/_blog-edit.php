<?php
include('dbconnection.php');
$idd = $_GET['id'];
$sql_query_show = "SELECT * FROM blog WHERE id = '$idd'";
$result = mysqli_query($conn, $sql_query_show);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['upload'])) {
    $id = $_POST['id'];
    $headline = $_POST['headline'];
    $document = $_POST['document'];
    $link = $_POST['link'];

    $sql_query_update = "UPDATE blog SET headline='$headline', document='$document', link='$link' WHERE id='$id'";
    $result_edit = mysqli_query($conn, $sql_query_update);
    if ($result_edit) {
        mysqli_close($conn);
        header("location:blog.php");
        exit;
    }
} 
elseif (isset($_POST['close'])) {
    header("location:blog.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Setting</title>


    <!-----Bootstrap CDN---------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <!------Jquery Table Design--------------->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="blog.css">


</head>

<body>
    <?php
    include('_nav-bar-header.php');
    ?>
    <div class="content">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="card edit">
                    <div class="card-body edit-body">
                        <form action="" method="post">

                            <div class="form-group row">
                                <label for="id" class="col-sm-2 col-form-label">Id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-0 " id="id" name="id" value="<?php echo $data['id']; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="headline" class="col-sm-2 col-form-label">Headline</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="headline" name="headline" value="<?php echo $data['headline']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="document" class="col-sm-2 col-form-label">Blog</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="document" rows="3" name="document"><?php echo $data['document']; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="link" name="link" value="<?php echo $data['link']; ?>">
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <input type="submit" name="close" class="btn btn-secondary" value="Close">
                                <input type="submit" name="upload" class="btn btn-success" value="Update">
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

</body>

</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Banner Setting</title>

        <!-----Bootstrap CDN---------->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/banner.css">
</head>

<body>
        <?php
        include('php/_nav-bar-header.php');
        include('php/_banner-content.php');
        ?>

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
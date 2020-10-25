<?php
require_once("./php/dbconfig/dbconnection.php");

$result = $conn->query("SELECT * FROM blog");
?>
<!-------Start Blog--------->
<section id="blogs">
  <div class="container-fluid py-4">
    <h4 class="font-rubik font-size-20">Latest Blogs</h4>
    <hr>

    <div class="owl-carousel owl-theme">
      <?php
      $i = 0;
      foreach ($result as $row) {
        $actives = '';
        if ($i == 0) {
          $actives = 'active';
        }

      ?>
        <div class="item <?= $actives; ?>">
          <div class="card boarder-0 font-rale p-3 mr-4" style="height:20rem; overflow:auto;">
            <h5 class="card-title font-size-16"><?php echo $row["headline"]; ?></h5>
            <small><?php echo $row["date"]; ?></small>
            <img src="admin/<?= $row['image_path'] ?>" alt="" class="card-img-fluid">
            <p class="card-text font-size-14 text-black-50"><?php echo $row["document"]; ?></p>
            <a href="<?php echo $row['link']; ?>" target="_blank" class="color-second text-left">See More</a>
          </div>
        </div>
      <?php
        $i++;
      }
      ?>
    </div>

  </div>

</section>
<!-------End Blog--------->
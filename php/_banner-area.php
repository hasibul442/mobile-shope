<?php
    require_once("./php/dbconfig/dbconnection.php");
    
    $result = $conn->query("SELECT image_path FROM banner");
?>
        <!------Start Carousel-------->
        <section id="banner-area">
            <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">

                <?php
                        $i=0;
                        foreach ($result as $row){
                            $actives = '';
                            if($i == 0){
                                $actives = 'active';
                            }
                        
                        ?>
                          <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>

                        <?php 
                          $i++;}
                        ?>
                </ol>
                <div class="carousel-inner">
                  <?php
                    $i=0;
                    foreach ($result as $row){
                      $actives = '';
                        if($i==0){
                             $actives = 'active';
                        }
                        
                  ?>
                  <div class="carousel-item <?= $actives; ?>">
                    <img class="d-block " src="admin/<?= $row['image_path'] ?>" width="100%" height="300px">
                  </div>
                  <?php 
                    $i++;}
                   ?>
                </div>

                <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </section>
        <!-------End Carousel-------->
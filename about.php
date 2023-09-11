<?php 
    require_once "include/header.php";
?><?php
require 'config.php';
$sql ="SELECT * FROM about_page ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $sql);     
$row = mysqli_fetch_assoc($result);
?>
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="about_section_2">
               <div class="row">
                  <div class="col-md-6"> 
                     <div class="image_iman"><img src="admin/uploads/<?= $row['banner']; ?>" class="about_img"></div>
                  </div>
                  <div class="col-md-6"> 
                     <div class="about_taital_box">
                        <h1 class="about_taital"><?= $row['title'] ;?></h1>
                        <p class="about_text">
                        <?= $row['content']; ?>
                        </p>
                        <!-- <div class="readmore_btn"><a href="#">Read More</a></div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php 
    require_once "include/footer.php";
?>
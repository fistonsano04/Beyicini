<?php 
    require_once "include/header.php";
?><?php
require 'config.php';
$sql ="SELECT * FROM about_page WHERE id=1";
$result = mysqli_query($con, $sql);                            
foreach ($result as $row) {
    $about_content = $row['content'];
    $banner = $row['banner'];
}
?>
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="about_section_2">
               <div class="row">
                  <div class="col-md-6"> 
                     <div class="image_iman"><img src="../uploads/<?php echo $banner; ?>" class="about_img"></div>
                  </div>
                  <div class="col-md-6"> 
                     <div class="about_taital_box">
                        <h1 class="about_taital">About <span style="color: #fe5b29;">Us</span></h1>
                        <p class="about_text">
                        <?php echo $about_content; ?>
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
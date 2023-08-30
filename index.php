<?php
require_once "include/header.php";
require_once "config.php";
$query = "SELECT * FROM cars ORDER BY id DESC LIMIT 8";
$results = mysqli_query($con, $query);
$count = mysqli_num_rows($results);
$resultsPerPage = 2; // Number of results per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Get current page number

$offset = ($page - 1) * $resultsPerPage;
$query = "SELECT * FROM cars LIMIT $offset, $resultsPerPage";
$results = mysqli_query($con, $query);

$totalResults = mysqli_num_rows(mysqli_query($con, "SELECT * FROM cars"));
$totalPages = ceil($totalResults / $resultsPerPage);
?>
<style>
   .gallery_section_2.show-all .col-md-4 {
      display: block !important;
   }
   .gallery_section_2.show-all .sim {
      display: none;
   }
</style>

<div class="call_text_main">
   <div class="container">
      <div class="call_taital">
         <div class="call_text"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span
                  class="padding_left_15">Location</span></a></div>
         <div class="call_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span
                  class="padding_left_15">(+71) 8522369417</span></a></div>
         <div class="call_text"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span
                  class="padding_left_15">demo@gmail.com</span></a></div>
      </div>
   </div>
</div>
<!-- banner section start -->
<div class="banner_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div id="banner_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="banner_taital_main">
                        <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span></h1>
                        <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the
                           majority</p>
                        <div class="btn_main">
                           <div class="contact_bt"><a href="about.php">Read More</a></div>
                           <div class="contact_bt active"><a href="contact.php">Contact Us</a></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="banner_taital_main">
                        <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span></h1>
                        <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the
                           majority</p>
                        <div class="btn_main">
                           <div class="contact_bt"><a href="#">Read More</a></div>
                           <div class="contact_bt active"><a href="#">Contact Us</a></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="banner_taital_main">
                        <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span></h1>
                        <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the
                           majority</p>
                        <div class="btn_main">
                           <div class="contact_bt"><a href="#">Read More</a></div>
                           <div class="contact_bt active"><a href="#">Contact Us</a></div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
         <div class="col-md-6">
            <div class="banner_img"><img src="images/banner-img.png"></div>
         </div>
      </div>
   </div>
</div>
<!-- banner section end -->
<!-- about section start -->
<div class="about_section layout_padding">
   <div class="container">
      <div class="about_section_2">
         <div class="row">
            <div class="col-md-6">
               <div class="image_iman"><img src="images/about-img.png" class="about_img"></div>
            </div>
            <div class="col-md-6">
               <div class="about_taital_box">
                  <h1 class="about_taital">About <span style="color: #fe5b29;">Us</span></h1>
                  <p class="about_text">going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                     embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to
                     repeat predefined going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                     embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to
                     repeat predefined </p>
                  <div class="readmore_btn"><a href="#">Read More</a></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- about section end -->
<div class="search_section">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="search_taital">Search Your Best Cars</h1>
            <p class="search_text">Using 'Content here, content here', making it look like readable</p>
            <!-- select box section start -->
            <div class="container">
               <div class="select_box_section">
                  <div class="select_box_main">
                     <div class="row">
                        <div class="col-md-3 select-outline">
                           <select class="mdb-select md-form md-outline colorful-select dropdown-primary">
                              <option value="" disabled selected>Any Brand</option>
                              <option value="1">Option 1</option>
                              <option value="2">Option 2</option>
                              <option value="3">Option 3</option>
                           </select>
                        </div>
                        <div class="col-md-3 select-outline">
                           <select class="mdb-select md-form md-outline colorful-select dropdown-primary">
                              <option value="" disabled selected>Any type</option>
                              <option value="1">Option 1</option>
                              <option value="2">Option 2</option>
                              <option value="3">Option 3</option>
                           </select>
                        </div>
                        <div class="col-md-3 select-outline">
                           <select class="mdb-select md-form md-outline colorful-select dropdown-primary">
                              <option value="" disabled selected>Price</option>
                              <option value="1">Option 1</option>
                              <option value="2">Option 2</option>
                              <option value="3">Option 3</option>
                           </select>
                        </div>
                        <div class="col-md-3">
                           <div class="search_btn"><a href="#">Search Now</a></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- select box section end -->
         </div>
      </div>
   </div>
</div>
<!-- gallery section start -->
<div class="gallery_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="gallery_taital">Our best offers</h1>
         </div>
      </div>
      <div class="gallery_section_2">
         <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($results)) {
               ?>
               <div class="col-md-4">
                  <div class="gallery_box">
                     <div class="gallery_img"><img src="admin/property/<?= $row['image']; ?>" style="height:12em;object-fit:cover;"></div>
                     <h3 class="types_text"><?= $row['brand']; ?></h3>
                     <p class="looking_text"><?= $row['daily_rental']; ?></p>
                     <div class="read_bt"><a href="singleview.php?car=<?= $row['id']; ?>">Book Now</a></div>
                  </div>
               </div>
               
               <?php
            }
            ?>
<div class="sim mt-5"></div>
         </div>
      </div>
   </div>
</div>
<div class="text-center mt-4">
      <?php if ($page > 1) { ?>
         <a class="btn btn-primary" href="?page=<?= $page - 1; ?>">Previous</a>
      <?php } ?>
      
      <?php if ($page < $totalPages) { ?>
         <a class="btn btn-primary" href="?page=<?= $page + 1; ?>">Next</a>
      <?php } ?>
   </div>
</div>
<!-- gallery section end -->
<!-- choose section start -->
<div class="choose_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="choose_taital">WHY CHOOSE US</h1>
         </div>
      </div>
      <div class="choose_section_2">
         <div class="row">
            <div class="col-sm-4">
               <div class="icon_1"><img src="images/icon-1.png"></div>
               <h4 class="safety_text">SAFETY & SECURITY</h4>
               <p class="ipsum_text">variations of passages of Lorem Ipsum available, but the majority have </p>
            </div>
            <div class="col-sm-4">
               <div class="icon_1"><img src="images/icon-2.png"></div>
               <h4 class="safety_text">Online Booking</h4>
               <p class="ipsum_text">variations of passages of Lorem Ipsum available, but the majority have </p>
            </div>
            <div class="col-sm-4">
               <div class="icon_1"><img src="images/icon-3.png"></div>
               <h4 class="safety_text">Best Drivers</h4>
               <p class="ipsum_text">variations of passages of Lorem Ipsum available, but the majority have </p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- choose section end -->
<!-- client section start -->
<div class="client_section layout_padding">
   <div class="container">
      <div id="custom_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="client_taital">What Says Customers</h1>
                  </div>
               </div>
               <div class="client_section_2">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="client_taital_box">
                           <div class="client_img"><img src="images/client-img1.png"></div>
                           <h3 class="moark_text">Hannery</h3>
                           <p class="client_text">It is a long established fact that a reader will be distracted by the
                              readable content of a page</p>
                        </div>
                        <div class="quick_icon"><img src="images/quick-icon.png"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="client_taital_box">
                           <div class="client_img"><img src="images/client-img2.png"></div>
                           <h3 class="moark_text">Channery</h3>
                           <p class="client_text">It is a long established fact that a reader will be distracted by the
                              readable content of a page</p>
                        </div>
                        <div class="quick_icon"><img src="images/quick-icon.png"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="client_taital">What Says Customers</h1>
                  </div>
               </div>
               <div class="client_section_2">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="client_taital_box">
                           <div class="client_img"><img src="images/client-img1.png"></div>
                           <h3 class="moark_text">Hannery</h3>
                           <p class="client_text">It is a long established fact that a reader will be distracted by the
                              readable content of a page</p>
                        </div>
                        <div class="quick_icon"><img src="images/quick-icon.png"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="client_taital_box">
                           <div class="client_img"><img src="images/client-img2.png"></div>
                           <h3 class="moark_text">Channery</h3>
                           <p class="client_text">It is a long established fact that a reader will be distracted by the
                              readable content of a page</p>
                        </div>
                        <div class="quick_icon"><img src="images/quick-icon.png"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="client_taital">What Says Customers</h1>
                  </div>
               </div>
               <div class="client_section_2">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="client_taital_box">
                           <div class="client_img"><img src="images/client-img1.png"></div>
                           <h3 class="moark_text">Hannery</h3>
                           <p class="client_text">It is a long established fact that a reader will be distracted by the
                              readable content of a page</p>
                        </div>
                        <div class="quick_icon"><img src="images/quick-icon.png"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="client_taital_box">
                           <div class="client_img"><img src="images/client-img2.png"></div>
                           <h3 class="moark_text">Channery</h3>
                           <p class="client_text">It is a long established fact that a reader will be distracted by the
                              readable content of a page</p>
                        </div>
                        <div class="quick_icon"><img src="images/quick-icon.png"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#custom_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#custom_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
         </a>
      </div>
   </div>
</div>
<!-- client section end -->
<!-- contact section start -->
<div class="contact_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="contact_taital">Get In Touch</h1>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="contact_section_2">
         <div class="row">
            <div class="col-md-12">
               <div class="mail_section_1">
                  <input type="text" class="mail_text" placeholder="Name" name="Name">
                  <input type="text" class="mail_text" placeholder="Email" name="Email">
                  <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number">
                  <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                  <div class="send_bt"><a href="#">Send</a></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- At the end of your HTML file, before the </body> tag -->
<script>
   const showMoreButton = document.querySelector("#showMoreButton");
   const gallerySection2 = document.querySelector(".gallery_section_2");
   
   showMoreButton.addEventListener("click", function() {
      gallerySection2.classList.toggle("show-all");
      showMoreButton.style.display = "none";
   });
</script>

<!-- contact section end -->
<?php
require_once "include/footer.php";
?>
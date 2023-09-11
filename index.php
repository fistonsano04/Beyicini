<?php
require_once "include/header.php";
require_once "config.php";
$query = "SELECT * FROM cars ORDER BY id DESC LIMIT 8";
$results = mysqli_query($con, $query);
?>
<style>
   /* Make the video container full-screen */
   #video-carousel .video-container video {
        filter: brightness(0.5); /* Adjust the value (0.7) to your preference */
    }

    /* Add a shadow effect to the video carousel */
    #video-carousel {
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.4); /* Adjust the shadow properties to your preference */
    }
.video-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* 16:9 aspect ratio for widescreen videos */
}

.video-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

   .container2 {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
   }

   .gallery_section_2.show-all .col-md-4 {
      display: block !important;
   }

   .gallery_section_2.show-all .sim {
      display: none;
   }

   .image-container {
      overflow: hidden;
      /* max-width: 768px; */
      /* width: 60em; */
      height: 50em;
   }

   .image-wrapper {
      display: grid;
      grid-auto-flow: column;
      grid-auto-columns: calc((100% - (7rem * (var(--per-view) - 6))) / var(--per-view));
      grid-gap: 2.5rem;
      position: relative;
      left: 0;
      transition: .3s;
      width: 60em;
      height: 20em;
   }

   .image-wrapper>* {
      /* aspect-ratio: 4 / 4; */
   }

   .cimg {
      width: 60em;
      height: 20em;
      object-fit: cover;
      display: block;
      border-radius: .5rem;
   }
   video::-webkit-media-controls {
    display: none;
}
/* .loader{
   position:fixed;
   background: #fff url("images/loader1.gif") no-repeat center center;
   background-size: 35%;
   height: 100vh;
   width: 100%;
   z-index: 100;
} */
   /* IMAGE */
</style>
<!-- <div class="loader">

</div> -->
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
<div id="video-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="video-container">
                <video autoplay muted loop>
                    <source src="images/v1.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="carousel-item active">
            <div class="video-container">
                <video autoplay muted loop>
                    <source src="images/v2.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="carousel-item">
            <div class="video-container">
                <video autoplay muted loop>
                    <source src="images/v3.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <!-- Add more video items as needed -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#video-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#video-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    <div class="position-absolute top-0 start-0 w-100 h-100">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-md-6 d-flex align-items-center">
                <div class="text-overlay animate__animated animate__fadeInLeft">
                    <h1 class="display-4 text-light">Experience the Freedom of Driving</h1>
                    <p class="lead  text-light">Your dream car is just a click away.</p>
                    <a href="vehicles" class="btn btn-lg text-light" style="background:#FE5B29">Book Now</a>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="text-overlay animate__animated animate__fadeInRight">
                    <h2 class="display-5  text-light">Why Choose Us?</h2>
                    <ul class="list-unstyled text-light">
                        <li><i class="fas fa-car text-light"></i> Premium Car Selection</li>
                        <li><i class="fas fa-clock text-light"></i> 24/7 Customer Support</li>
                        <li><i class="fas fa-route text-light"></i> Explore Exciting Destinations</li>
                        <li><i class="fas fa-shield-alt text-light"></i> Safety and Reliability</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<!-- <div class="banner_section layout_padding">
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
                           <div class="contact_bt"><a href="about">Read More</a></div>
                           <div class="contact_bt active"><a href="contact">Contact Us</a></div>
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
</div> -->
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
      <div class="container2 mt-5">
         <div class="image-container">
            <div class="image-wrapper">
            <?php
            while ($row = mysqli_fetch_assoc($results)) {
               ?>
               <div class="gallery_box">
                  <img
                  src="admin/property/<?= $row['image']; ?>"
                  style="object-fit:cover;" alt="" class="cimg">
                     <h3 class="types_text">
                        <?= $row['brand']; ?>
                     </h3>
                     <p class="looking_text">
                        <?= $row['daily_rental']; ?>
                     </p>
                     <div class="read_bt"><a href="singleview.php?car=<?= $row['id']; ?>">Book Now</a></div>
               </div>
               <?php
            }
            ?>
            </div>
         </div>
      </div>
      
   </div>
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
            <div id="custom_slider" class="carousel slide" data-bs-ride="carousel">
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
                                        <p class="client_text">It is a long established fact that a reader will be distracted by the readable content of a page</p>
                                    </div>
                                    <div class="quick_icon"><img src="images/quick-icon.png"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="client_taital_box">
                                        <div class="client_img"><img src="images/client-img2.png"></div>
                                        <h3 class="moark_text">Channery</h3>
                                        <p class="client_text">It is a long established fact that a reader will be distracted by the readable content of a page</p>
                                    </div>
                                    <div class="quick_icon"><img src="images/quick-icon.png"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add more carousel items as needed -->
                </div>
                <a class="carousel-control-prev" href="#custom_slider" role="button" data-bs-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#custom_slider" role="button" data-bs-slide="next">
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

   showMoreButton.addEventListener("click", function () {
      gallerySection2.classList.toggle("show-all");
      showMoreButton.style.display = "none";
   });
</script>

<!-- contact section end -->
<?php
require_once "include/footer.php";
?>
<script>
   $(document).ready(function () {
      $(".owl-carousel").owlCarousel({
         items: 4,
         loop: true,
         margin: 10,
         autoplay: true,
         autoplayTimeout: 1000,
         autoplayHoverPause: true
      });
   });
   const imageWrapper = document.querySelector('.image-wrapper')
   const imageItems = document.querySelectorAll('.image-wrapper > *')
   const imageLength = imageItems.length
   const perView = 3
   let totalScroll = 0
   const delay = 2000

   imageWrapper.style.setProperty('--per-view', perView)
   for (let i = 0; i < perView; i++) {
      imageWrapper.insertAdjacentHTML('beforeend', imageItems[i].outerHTML)
   }

   let autoScroll = setInterval(scrolling, delay)

   function scrolling() {
      totalScroll++
      if (totalScroll == imageLength + 1) {
         clearInterval(autoScroll)
         totalScroll = 1
         imageWrapper.style.transition = '0s'
         imageWrapper.style.left = '0'
         autoScroll = setInterval(scrolling, delay)
      }
      const widthEl = document.querySelector('.image-wrapper > :first-child').offsetWidth + 24
      imageWrapper.style.left = `-${totalScroll * widthEl}px`
      imageWrapper.style.transition = '.3s'
   }
   
   $(document).ready(function () {
        $('#video-carousel').carousel();
    });
</script>
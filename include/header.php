<!DOCTYPE html>
<html>

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>PICLAND</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.2.0/swiper-bundle.min.css"
      integrity="sha512-s6khMl5GDS1HbQ5/SwL1wzMayPwHXPjKoBN5kHUTDqKEPkkGyEZWKyH2lQ3YO2q3dxueG3rE0NHjRawMHd2b6g=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- bootstrap css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/lo.png" />
   <!-- font css -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@400;500;600;700;800&display=swap"
      rel="stylesheet">
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>
<style>
   .loginbtn a {
      color: #fff;
   }

   .loginbtn {
      border: 1px solid #fe5b29;
      background: transparent;
      color: #fff;
   }

   .loginbtn:hover {
      background-color: #fe5b29;

   }
   .loader {
      position: fixed;
      background: #fff url("images/loader1.gif") no-repeat center center;
      background-size: 35%;
      height: 100vh;
      width: 100%;
      z-index: 100;
   }
</style>

<body>
<div class="loader"></div>
   <!-- header section start -->
   <div class="header_section">
      <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php"><img src="images/lo2.png"
                  style="height:4em; width:8em; object-fit:cover;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="index">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="vehicles">Vehicles</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="services">Services</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact">Contact</a>
                  </li> 
               </ul>
               <div class="btn">
                  <button type="button" class="btn btn-outline loginbtn"><a href="login">Login</a></button>
               </div>
               <form class="form-inline my-2 my-lg-0">
               </form>
            </div>
         </nav>
      </div>
   </div>
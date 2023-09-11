<?php include('session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./css/style2.css">
        <!-- Bootstrap 5 CSS -->
        <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <!-- Data Table CSS -->
        <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
        <!-- Font Awesome CSS -->
        <link rel='stylesheet'
                href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="icon" href="../images/lo.png" />
        <title>ADMIN Dashboard</title>
</head>

<body>
        <div class="d-flex" id="wrapper">
                <!-- Sidebar -->
                <div class="" id="sidebar-wrapper" style="background:#FE5B29">
                        <div
                                class="sidebar-heading text-center py-4 text-light fs-4 fw-bold text-uppercase border-bottom">
                                <i class="fas fa-user-secret me-2 text-light"></i>PICLAND
                        </div>
                        <div class="list-group list-group-flush my-3">
                                <a href="dashboard"
                                        class="list-group-item list-group-item-action bg-transparent text-light active"><i
                                                class="fas fa-tachometer-alt me-2 text-light"></i>Dashboard</a>
                                <a href="cars"
                                        class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i
                                                class="fas fa-project-diagram me-2 text-light"></i>Cars</a>
                                <a href="aboutview"
                                        class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i
                                                class="fas fa-project-diagram me-2 text-light"></i>about us</a>
                                <a href="bookings"
                                        class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i
                                                class="fas fa-chart-line me-2 text-light"></i>Bookings</a>
                                <a href="users"
                                        class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i
                                                class="fas fa-paperclip me-2 text-light"></i>Users</a>
                                <a href="feedback"
                                        class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i
                                                class="fas fa-shopping-cart me-2 text-light"></i>Feedbacks</a>
                                <a href="logout"
                                        class="list-group-item list-group-item-action bg-transparent text-dark fw-bold"><i
                                                class="fas fa-power-off me-2 text-dark"></i>Logout</a>
                        </div>
                </div>
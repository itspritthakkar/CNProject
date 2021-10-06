<?php include "config/database.php"; ?>
<?php 
session_start();
$user_id= !empty($_SESSION['uid'])?$_SESSION['uid']:'';
$user_name= !empty($_SESSION['uname'])?$_SESSION['uname']:'';
$user_email= !empty($_SESSION['email'])?$_SESSION['email']:'';
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>FindDoc</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- SLIDER -->
        <link rel="stylesheet" href="assets/css/tiny-slider.css"/>
        <!-- Select2 -->
        <link href="assets/css/select2.min.css" rel="stylesheet" />
        <!-- Date picker -->
        <link rel="stylesheet" href="assets/css/flatpickr.min.css">
        <link href="assets/css/jquery.timepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.1.95/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="assets/css/unicons.iconscout.com/release/v3.0.6/css/line.css"  rel="stylesheet">
        <!-- Css -->
        <link href="assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />

    </head>

    <body>
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="#">
                        <span class="logo-light-mode">
                            <img src="assets/images/logo-dark.png" class="l-dark" height="84" alt="">
                            <img src="assets/images/logo-light.png" class="l-light" height="84" alt="">
                        </span>
                        <img src="assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                    </a>
                </div>
                <!-- End Logo container-->
                
                <!-- Start Mobile Toggle -->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
                <!-- End Mobile Toggle -->

                <!-- Start Dropdown -->
                <ul class="dropdowns list-inline mb-0">
                    <li class="list-inline-item mb-0 ms-1">
                        <div class="dropdown dropdown-primary">
                            <?php if(!empty($user_name)) { ?>
                            <a href="dashboard.php"><button type="button" class="btn btn-pills btn-soft-primary p-0" ><img src="assets/images/patient/<?php $user['']; ?>" class="avatar avatar-ex-small rounded-circle" alt=""></button></a>
                            <?php } else {?>
                            <a href="login.php"><button type="button" class="btn btn-pills btn-soft-primary p-0" ><img src="assets/images/avatar.jpg" class="avatar avatar-ex-small rounded-circle" alt=""></button></a>
                            <?php } ?>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- Start Dropdown -->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->

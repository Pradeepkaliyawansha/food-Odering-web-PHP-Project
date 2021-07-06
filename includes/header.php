<?php
 ini_set('session.cookie_samesite', 'None'); // from index.php
 ini_set('session.cookie_secure', 'true'); // from index.php
session_start();
// $count;
// if(isset($_SESSION['user_cart'])){
//     $count = $_SESSION[]
// }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/amila.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="/css/ricestyle.css"> -->
    <link rel="stylesheet" href="css/number.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- top nav bar -->
    <div class="container-fluid ">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar ">
            <div class="container">
               <a href="index.php"> <img width="80px" height="40px" src="images/logo.png" alt="logo"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navi" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto" style="padding-left:10px ;">

                        <li class="nav-item active"><a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="#category">Categories</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                        <li class="nav-item">
                            <?php 
                               
                               
                              if(isset($_SESSION['user_cart'])){
                                  $count = count($_SESSION['user_cart']);

                                  //echo $count;
                              }else{
                                echo " ";
                              }
                            
                        echo "</li>";
                        if(isset($_SESSION['user_cart'])){     
                            if(count($_SESSION['user_cart']) == 0){
                               echo " <li class='nav-item'><a class='nav-link' href='cart.php'><i style='color:#EDBB00' class='fa fa-shopping-cart fa-2x' aria-hidden='true'></i></a></li>";
                               echo "<span style='color:yellow;padding:2px;font-weight:bold;'>$count</span>";
                            }
                            else{
                                echo " <li class='nav-item'><a class='nav-link' href='cart.php'><i style='color:red' class='fa fa-shopping-cart fa-2x' aria-hidden='true'></i></a></li>";
                                echo "<span style='color:yellow;padding:2px;font-weight:bold;'>$count</span>";
                            }
                        }
                        ?>
                         <!-- <li class="nav-item"><a class="nav-link" href="#"><i style="margin-left :100px;color:#EDBB00" class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a></li> -->
                       

                        <!-- logout check-------------- -->
                        <?php
                        if(isset($_SESSION['user_name'])){
                           // echo " <li class='nav-item'><a class='nav-link' href='cart.php'><i style='color:red' class='fa fa-shopping-cart fa-2x' aria-hidden='true'></i></a></li>";
                           echo " <li class='nav-item' style='margin-left :30px;'><a class='nav-link' href='login_signin/logout.php'><span class='label label-danger log' style='padding:10px' id='loging'>Logout</span></a></li>";
                           echo " <li class='nav-item' style='margin-left :30px;'><span class='' style='padding:10px;color:#EDBB00;font-weight:bold' id='loging'>{$_SESSION['user_name']}</span></li>";

                        }
                        else{
                           echo " <li class='nav-item' style='margin-left :30px;'><a class='nav-link' href='login_signin/login1.php'><span class='label label-danger log' style='padding:10px' id='loging'>Loging</span></a></li>";
                        }

                        ?>
                       <!-- logout end -------------- -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- <a href="../login_signin/login1.php">log weyan</a> -->
    <!-- ----nav bar end------------ -->
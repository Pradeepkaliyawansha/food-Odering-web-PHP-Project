<?php 
session_start();

if(isset($_SESSION['user_name'])){
    session_destroy();
   
    header('location:../index.php');
}

?>
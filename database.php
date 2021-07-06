<?php 
 
    $database = mysqli_connect('localhost','root','','food_ordering');

    if (mysqli_connect_errno()) {
        die("Connection failed." . mysqli_connect_error());
    }

?>
<?php 
 
    $database = mysqli_connect('us-cdbr-east-04.cleardb.com','b8caf3a4d70bee','5f9ebed9','heroku_1a97158de8a9d31');

    if (mysqli_connect_errno()) {
        die("Connection failed." . mysqli_connect_error());
    }

?>

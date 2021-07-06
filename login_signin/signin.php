<?php
// include('../includes/header.php');
	function is_email($email) {
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i" ,$email));
	}
?>
<?php
    require_once('../database.php'); 
?>

<?php
    $errors = array();

    // check whether login button pressed or not

    if (isset($_POST["signin"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $telephone = $_POST["telephone_num"];
        $address = $_POST["address"];
        $account = $_POST["accnt_number"];
        $answer = $_POST["answer"];
        $account_balance = 10000;


        // checking if email address already exists.

        $hashed_email = md5($email);
        $query = "SELECT*FROM users WHERE email = '{$hashed_email}'";

        
        $result_set = mysqli_query($database,$query);

        $result_set_2 = mysqli_fetch_all($result_set);

        if (count($result_set_2) != 0) {
            if (mysqli_num_rows($result_set) == 1) {
                $errors[] = "Email address already exists";
            }
            echo "success5";
        }
        else{
            // inputs validation process

            if (!isset($account) || strlen(trim($account)) < 16 ) {
                $errors[] = "Invalid account number";
            }if (strlen(trim($password)) <= 4) {
                $errors[] = "Please enter a strong password";
            }if ($password != $password2) {
                $errors[] = "Passwords doesn't match";
            }if (!is_numeric($telephone) || strlen(trim($telephone)) <10  ) {
                $errors[] = "Invalid phone number";
            }

            // email validation with php

            if ( is_email($_POST['email']) == false ) {
                    $errors[] = "Invalid email address.";
                }
            // sending user details to the database

        if(empty($errors)){

            $email = mysqli_real_escape_string($database,$email);
            $hashed_email = md5($email);
            
            $account = mysqli_real_escape_string($database,$account);
            $hashed_account = ($account);
            
            $password = mysqli_real_escape_string($database,$password);
            $hashed_password = md5($password);

            $name = mysqli_real_escape_string($database,$name);
            $address = mysqli_real_escape_string($database,$address);
            $telephone = mysqli_real_escape_string($database,$telephone);
            $answer = mysqli_real_escape_string($database, strtolower($answer));

            $query = "INSERT INTO users(name,password, address, telephone, account, account_balance, email, answer)VALUES('{$name}','{$hashed_password}','{$address}','{$telephone}','{$hashed_account}', '{$account_balance}','{$hashed_email}', '{$answer}');";


            $result = mysqli_query($database,$query);

            if (isset($result)) {
                //in here need to add the user detail session
                header('Location: login1.php');
            }else{
                echo "error";
            }
        }
    }
}

                        
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" user-scalable="no" initial-scale="1.0" maximum-scale="1.0" minimum-scale="1.0">

    <title>Document</title>
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https:ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/signin.js"></script>


    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/mobster.css">

</head>

<body>
<div style="background:rgba(0, 0, 0, 0.534);padding: 20px;" class="header">
        <a href="../index.php"><img width="100px" height="50px" src="images/logo.png" alt="ninda"></a>
        <a href="../index.php" id="signin-submit" style="padding:5px;width: 58px" class="btn btn-warning">Home</a>
    </div>
    <div class="signin container-fluid">
        <div class="signin-wrapper row">
        <div class="col-lg-5 col-sm-0 wow fadeInLeft signin-image-div" >
            <img
                    src="./images/pngfind.com-pizzaiolo-png-3304643.png" class="floating-animate signin-image"
                    alt="" style="width: 80%;" srcset=""></div>
            <div  class="col-lg-7  col-sm-12 wow zoomIn signin-form-div" >
                <form  class="signin-form jumbotron" method="post" id="signin-form">
                    <div class="signin-heading form-group" >
                        <h4>Sign In</h4>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" required name="name" id="signin-input" >
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="signin-input" name="email" aria-describedby="emailHelp" required
                            placeholder="Enter email" >
                    </div>

                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address" id="signin-input" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="accnt_number" class="form-control" id="signin-input" placeholder="Account" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="signin-input" name="telephone_num" placeholder="Telephone Number" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="password" name="password" class="form-control" id="signin-input" placeholder="Password" required>
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" id="signin-input" name="password2" placeholder="Re-Enter Password" required>
                        </div>
                        <!-- <div class="col">
                            <input type="password" class="form-control" id="signin-input" name="password2" placeholder="Re-Enter Password" required>
                        </div> -->
                    </div>
                    
                    <!-- <div class="signin-forgot-password">
                        <p  style="color: #d35f17;padding:10px 0px 0px 10px">What is your pet name?</p>
                        
                        <div class="form-group forgot-password">
                        <input type="text" class="form-control" placeholder="Pet Name" id="signin-input" required>
                    </div>
                    </div> -->
                    
                    <div class="signin-forgot-password">
                        <p  style="color: #d35f17;padding:10px 0px 0px 10px">What is your pet name?</p>
                        
                        <div class="form-group forgot-password">
                        <input type="text" name="answer" class="form-control" placeholder="Pet Name" id="signin-input" required>
                    </div>
                    </div>
                    
                    <?php
                    
                    if (isset($errors) && !empty($errors)) {
                        echo "<div class='error'>";
                        foreach($errors as $error){
                            echo "<li>";
                            echo $error;
                            echo "</li>";
                        }
                        echo "</div>";
                    }
                    ?>
                    <div class="signin-btns">
                        <!-- <button type="submit" id="signin-submit" class="btn btn-primary"><a href="login1.php">Log In</a></button> -->
                        <button type="submit" name="signin" id="signin-signin" class="btn btn-primary">Sign In</button>
                    </div>

                </form>
            </div>
        </div>
        
    </div>


</body>

</html>



<script src="js/wow.min.js"></script>

<script src="js/mobster.js"></script>
<script src="js/jquery.min.js"></script>

<?php mysqli_close($database);?>

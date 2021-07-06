<?php 

session_start();
// include('../includes/header.php');

if(isset($_POST['login'])){
    userLogin();
}
$response;

function userLogin(){
   global $response;
   require_once('../database.php');
   if($_POST['email'] != '' && $_POST['password'] != ''){
       
       $emailHashed = md5($_POST['email']);
       $passwordHashed = md5($_POST['password']);

       $query = "SELECT * FROM users WHERE email='$emailHashed'";
       $row = mysqli_query($database,$query);
       $userDetails = mysqli_fetch_all($row);
       
       if(count($userDetails) !=0){
        //    echo $userDetails[0][3];
        //    echo "<br>";
        //    echo $passwordHashed;
          if($userDetails[0][3] == $passwordHashed){
              //in here need to add user details to session
            $_SESSION['user_name'] = $userDetails[0][1];
            $_SESSION['user_balance'] = $userDetails[0][7];
            $_SESSION['user_card'] = $userDetails[0][6];
            $_SESSION['user_id'] = $userDetails[0][0];
            header('location:../index.php');
          }else{
             $response = "Invalid Password";
          }
        }
        else{
            $response = "Invalid Email";
        }
    }else{
       $response = "Every Feild Must filled";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https:ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="js/signin-login.js"></script>

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/mobster.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
</head>

<body>
<div style="background:rgba(0, 0, 0, 0.534);padding: 20px;" class="header">
        <a href="../index.php"><img width="100px" height="50px" src="images/logo.png" alt="ninda"></a>
        <a href="../index.php" id="login-submit" style="padding:5px;width: 58px" class="btn btn-warning">Home</a>
    </div>
    <div class="login container-fluid">
        <div class="login-wrapper row">
            
            <div class="col-md-6 col-sm-12 wow fadeInUp">
                     
                <form class="login-form jumbotron" method="post" action="login1.php" id="login-form">
                
                    <div class="login-heading">
                    
                        <h4>Log In</h4>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" required class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="input-group mb-3"  >
                        <input type="password" name="password" required class="form-control" placeholder="Password"
                        id="login-password">

                        <span class="input-group-text" id="login-show-password">
                        <i class="fas fa-eye-slash" id="login-eye-slash"></i>
                        <i class="fas fa-eye" style="display: none;" id="login-eye"></i>
                        </span>
                    </div>
                    <div>
                     <?php 
                        if(isset($response)){
                            echo "<h6 style='color:red;text-align:center'>$response</h6>";
                        }else{
                            echo "<h6 style='text-align:center'>Get your taste</h6>";
                        }
                     ?>
                    </div>
                    <div class="login-forgot-password">
                        <a href="passwordreset.php" style="color: #d35f17;">
                        forgot password?
                        </a>
                    </div>
                    
                    <div class="login-btns">
                        <input type="submit"  id="login-submit" class="btn btn-primary" title="Submit" name="login" />
                        <a href="signin.php" id="login-signin" class="btn btn-primary">Sign In</a>
                    </div>

                    
                </form>
                
            </div>
            
            <div class="col-md-6 col-sm-0 wow fadeInDown login-image-div">
                <img  src="./images/login.png" class="floating-animate login-image" alt="" style="width: 600px;" srcset="">
            </div>
        
        
        </div>
    </div>
    

</body>

</html>


<script src="js/wow.min.js"></script>

<script src="js/mobster.js"></script>
<script src="js/jquery.min.js"></script>
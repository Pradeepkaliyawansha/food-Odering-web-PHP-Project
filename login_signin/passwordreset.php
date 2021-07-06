<?php 

session_start();
// include('../includes/header.php');
if(isset($_POST['reset'])){
    passwordReset();
}

$response;

function passwordReset(){
   global $response;
   require_once('../database.php');
   if($_POST['email'] != '' && $_POST['answer'] != '' && $_POST['new_password'] != ''){
       
       $emailHashed = md5($_POST['email']);
       //$passwordHashed = md5($_POST['new_password']);
       $answer =  strtolower($_POST['answer']);
       
       $query = "SELECT * FROM users WHERE email='$emailHashed'";
       $row = mysqli_query($database,$query);
       $userDetails = mysqli_fetch_all($row);
       //echo print_r($userDetails);
       
       if(count($userDetails) !=0)
          if($userDetails[0][8] == $answer){

            if(strlen($_POST['new_password']) > 8){
                $passwordHashed = md5($_POST['new_password']);
                $query2 = "UPDATE users SET password='$passwordHashed' WHERE email='$emailHashed'";
                $row2 = mysqli_query($database,$query2);
                //$userDetailsNew = mysqli_fetch_all($row2);
                //echo print_r($userDetailsNew);
                //echo print_r($row2);
                if($row2){
                    //for this need to add header function with location to login page
                   $response = "Successfully Changed";
                   header('location:login1.php');
                }else{
                    $response = "Something went with the server";
                }
            }
            else{
                $response = "Password must have more than 7 charactors";
            }
            
          }else{
             $response = "Wrong Answer Please try again";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div style="background:rgba(0, 0, 0, 0.534);padding: 20px;" class="header">
        <a href="../index.php"><img width="100px" height="50px" src="images/logo.png" alt="ninda"></a>
        <a href="../index.php" id="signin-submit" style="padding:5px;width: 58px" class="btn btn-warning">Home</a>
    </div>
   <div class="container-fluid">
     <div class="row">
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
        
        <form class="login-form jumbotron" method="post" action="passwordreset.php" id="login-form">
                    <div class="login-heading">
                        <h4>Password Reset</h4>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" name="email" required class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    
                    <div class="input-group mb-3"  >
                        <input type="password" name="answer" required class="form-control" placeholder="Pet Name"
                        id="login-password">

                        <span class="input-group-text" id="login-show-password">
                        <i class="fas fa-eye-slash" id="login-eye-slash"></i>
                        <i class="fas fa-eye" style="display: none;" id="login-eye"></i>
                        </span>
                    </div>
                    
                    <div class="input-group mb-3"  >
                        <input type="password" name="new_password" required class="form-control" placeholder="New Password"
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
                            echo "<h6 style='text-align:center'></h6>";
                        }
                     ?>
                    </div>
                    <!-- <div class="login-forgot-password">
                        <a href="" style="color: #d35f17;">
                        forgot password?
                        </a>
                    </div> -->
                    
                    <div class="login-btns">
                        <input type="submit"  id="login-submit" class="btn btn-primary" title="Reset" name="reset" />
                        <!-- <a href="signin.php" id="login-signin" class="btn btn-primary">Sign In</a> -->
                    </div>
                </form>
        
        </div>
        
        <div class="col-md-3"></div>
     </div>
   </div>
</body>
</html>

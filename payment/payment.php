<?php session_start();

//echo print_r($_SESSION['total']);
//echo print_r($_POST);
if (isset($_POST["pay"])) {
    payment(); ?>
    <!-- <script>location.href='../invoice.php' </script> -->
<?php
}

$response;
function payment()
{ ?>

<?php global $response;
    require_once('../database.php');
    if ((int)$_SESSION['user_balance'] >= $_SESSION['total']) {
        (int)$_SESSION['user_balance'] -=  $_SESSION['total'];
        //echo (int)$_SESSION['user_balance'];
        $bal = (int)$_SESSION['user_balance'];
        $id = $_SESSION['user_id'];
        $query = "UPDATE users SET account_balance = $bal WHERE user_Id='$id' ";
        $row = mysqli_query($database, $query);
        //echo print_r($_SESSION['user_cart']);
        $_SESSION['user_cart'] = [];
        $_SESSION['total'] = 0;

        $response = 'Payment Successfull'; 
      
        

    } else {
        //echo " nayata dimen mithurath mudalat natiwe";

        $response = 'Payment failed, Check Your Account'; 
       
     }
}
//echo "$response";
?>

<head>
    <title>Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src='./js/hello.js'></script>
    <!-- <script src='../hello.js'></script> -->
    <link rel="stylesheet" href="style3.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function() {
            $('.click').click(function() {
                $('.popup_box').css("display", "block");
            });
            $('.btn1').click(function() {
                $('.popup_box').css("display", "block");
            });
            $('.btn2').click(function() {
                $('.popup_box').css("display", "none");
                alert("Do you want to Proceed?");
            });
            $('.btn3').click(function() {
                $('.popup_box').css("display", "none");
                
            });
        });
    </script>
</head>

<body>

    <!-- <h2 align="center">Checkout Form</h2> -->
    <div class="row">
        <div class="col-75">
            <div class="container col-md-6">
                <a href="../index.php"style="color:white;display:block;text-align:right;text-decoration:none;background-color:navy;border-radius:100px;padding:3px"> <i class="fa fa-home" style="color:white;background-color:navy"></i>Back to HOME</a> <br>
               
                
                 <form method="post"  action='./payment.php'>
                <div class="row">
                       
                        <div class="col-50">
                            <h3 style="text-align: center;">Card Pay</h3>
                            <label for="fname" >Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>

                            <label for="cname">Name on Card</label>


                            <!-- credit card type -->
                            <?php //echo gettype([$_SESSION['user_card']]); 


                            $list = str_split($_SESSION['user_card']);
                            switch ($list[0]) {
                                case '4':
                                    $cname = "Visa";
                                    //echo " ninda";
                                    break;
                                default:
                                    $cname = "Master";
                                    //echo "sudari ";
                            }



                            ?>

                            <!-- credit card type  end-->



                            <input type="text" id="cname" value="<?php echo $cname; ?>" name="cardname" placeholder="Visa,Master or More">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" onchange="onCardChange(this.value)" value="<?php echo $_SESSION['user_card'] ?>" placeholder="">

                            <label for="cname">Card Holder Name</label>
                            <input type="text" id="chname" value="" required name="cardname" placeholder="saman perera">

                            <div class="row">
                                <div class="col-6">
                                    <label for="expmonth">Exp On</label>
                                    <input type="month" id="expmonth" required name="expmonth" placeholder="select month/year">
                                </div>
                                <div class="col-6">
                                    <label for="cvv">CVV</label>
                                    <input type="number" id="cvv" required name="cvv" max='999' placeholder="123">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- --------------------------------- -->
                    <?php
                    //global $response
                    if (isset($response)) {
                        echo "<h3 class='warning'style='text-align:center' >$response </h3>"; ?>

                    <?php    }


                    ?>


<!-- <a href=""class="click">click me</a> -->
                  <input id="paybill" type="Button" value="Pay LKR.<?php echo $_SESSION['total'] ?>.00" class="btn btn-warning click" >
                    <!-- <a href="../invoice.php">bapan mawa</a> -->
                    <!-- ------------------------ -->

                    <div class="popup_box  ">
                        <i class="fa fa-exclamation"></i>
                        <a href="" class="btn3">X</a>
                        <h1>Bill Payment!</h1>
                        <label>Are you sure to proceed?</label>
                        <div class="btns">
                            <input id="paybill" type="submit" value="Pay LKR.<?php echo $_SESSION['total'] ?>.00" class=" btn-warning btn2" name="pay">
                            
                            <a href="../invoice.php" class="btn1">Download Bill</a>
                        </div>
                    </div>
                    <!-- ---------------------------------- -->
                </form>
            </div>
        </div>
    </div>


    <!-- value="Pay LKR.<?php //echo $_SESSION[total] 
                        ?>.00" -->
                        
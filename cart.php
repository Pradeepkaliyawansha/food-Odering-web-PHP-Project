<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
//session_start();
include('includes/header.php');
//require_once('./database.php');
// echo "<pre>";
//echo print_r($_SESSION);
// echo "</pre>";
$status = "";
//echo print_r($_POST['order_id']);
///echo print_r($_POST);
//-------------------------------------------------------------------------------
if (isset($_POST['order_id']) && $_POST['action'] == "remove") {
    //echo print_r($_POST['order_id']);
    $count = 0;
    if (!empty($_SESSION["user_cart"])) {
        foreach ($_SESSION["user_cart"] as $array) {
            $count++;
            //    echo"<pre>";
            //    echo print_r($array[7]);
            //    echo"</pre>";
            // echo print_r([$array][0][7]); 
            //$num = (int)([$array][0][7]); 
            //echo gettype($key);
            //echo print_r($_POST['order_id']);
            if ($_POST["order_id"] == [$array][0][7]) {
                //echo print_r($_POST["order_id"]);
                //echo "Count: {$count}";
                $correct = $count - 1;
                //    echo"<pre>";

                $secondsWait = 1;


                array_splice($_SESSION['user_cart'], $correct, 1);       // this function -->  (specific array, index of the array need to rm, range)
                header("Refresh:$secondsWait");
                //    echo"</pre>";4444444
                //echo print_r($_SESSION['user_cart'][$array][0][$num]);
                //unset($_SESSION['user_cart']);

            }

            if (empty($_SESSION["user_cart"])) {
                unset($_SESSION["user_cart"]);
            }
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["user_cart"] as &$value) {
        if ($value['id'] === $_POST["id"]) {
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }
}
//----------------------------------------------------------






?>
<html>

<head>


    <title>Food Cart</title>

    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

<body style="margin-top: 50px;">

    <h2>Food Cart</h2>

    <?php
    if (!empty($_SESSION["user_cart"])) {
        $cart_count = count(array_keys($_SESSION["user_cart"]));
    ?>


    <?php
    }
    ?>

    <div class="cart">
        <?php
        if (isset($_SESSION["user_cart"])) {
            $total_price = 0;
        ?>
            <div class="small-container cart-page">
                <div style="overflow-x:auto;">
                    <table>
                        <tr>
                            <!-- <th>Order ID</th> -->
                            <th>Item</th>
                            <th>Portion</th>
                            <th>Quantity</th>
                            <!-- <th>Unit <br />Price</th> -->
                            <th>Aditional <br /> item price</th>
                            <th>Items <br />Total</th>
                            <th></th>

                        </tr>
                        <?php
                        foreach ($_SESSION["user_cart"] as $items) {
                        ?>
                            <tr>
                                <!-- <td><?php echo  $items[7]; ?></td> -->
                                <td>
                                    <?php echo $items[1]; ?><br />

                                </td>
                                <td><?php echo "LKR " . $items[5] . ".00"; ?></td>
                                <td><?php echo  $items[2]; ?></td>
                                <!-- <td><?php echo  $items[6]; ?></td> -->
                                <td><?php echo  $items[4]; ?></td>
                                <td><?php echo  ((int)$items[4] * (int)$items[2]) + ((int)$items[5] * (int)$items[2]); ?></td>
                                <td>
                                    <form method='post' action=''>
                                        <input type="hidden" id="order_id" name="order_id" value='<?php echo $items[7]; ?>' />
                                        <input type='hidden' name='action' value="remove" />

                                        <button class="button" type='submit' class='remove'>Remove Item</button>

                                    </form>
                                </td>
                            </tr>
                        <?php
                            $total_price += ($items[4]*$items[2]) + ($items[5] * $items[2]);
                        }
                        ?>


                        <tr>
                            <td colspan="7" align="right">
                                <hr>
                                <strong>TOTAL: <?php echo "LKR " . $total_price .".00";?>
                                    <hr>
                                </strong>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
            $_SESSION['total'] = $total_price;
        } else {
            echo "<h3>Your cart is empty!</h3>";
        }
        ?>


        <!-- loging check--------------------- -->
        <?php
        if (isset($_SESSION['user_name'])) {
            //echo "log wela";
        ?>
            <br /><br />
            <div class="paybtn">
                <a href="payment/payment.php">
                    <input type="submit" class="button2" value="Pay The bill" />
                </a>
            </div>
        <?php
        } else {
            //echo "pala";
        ?>
            <br /><br />
            <div class="paybtn">
                
                <input type="submit" class="button2"  id="bill" value="Pay The bill" />
            </div>
        <?php } ?>


        <!-- loging check--------------------- -->

        <!-- <br /><br />
        <div class="paybtn">
        <a href="payment/payment.php">
            <input type="submit" class="button2" value="Pay The bill" />
        </a>
        </div> -->

</body>

<script src="hello.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- footer php joined -->
<?php include('includes/footer.php'); ?>
<!-- end -->
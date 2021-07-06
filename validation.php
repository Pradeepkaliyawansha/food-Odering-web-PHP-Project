<?php
session_start();
//echo $_SESSION['name'];
//session_destroy();
if($_REQUEST['order']){
 // echo  print_r($_REQUEST);
   add_to_cart();
}

function add_to_cart(){
    if($_REQUEST['item_id']!='' && $_REQUEST['item_quantity']!=''){

      if(!isset($_SESSION['user_cart'])){
        $_SESSION['user_cart'] = array();
      }
        $date = getdate();
        $order_id = "$date[year]$date[mon]$date[mday]$date[hours]$date[minutes]$date[seconds]";

        //get all details for additional items from database
        $additional_item = $_REQUEST['additional_item'];
        require_once('./database.php');
        
        $item = array(
          $_REQUEST['item_id'],
          $_REQUEST['item_name'],
          $_REQUEST['item_quantity'],
          $_REQUEST['additional_item'],
          $_REQUEST['additional_item_quantity'],
          $_REQUEST['portion'],
          $_REQUEST['price'],
          $order_id,
         
        );

        


        array_push($_SESSION['user_cart'],$item);
        //echo print_r($_SESSION['user_cart']);
        header('location:index.php');
    }else{
        echo "Plz input id and quantity of product";
    }
  }
?> 



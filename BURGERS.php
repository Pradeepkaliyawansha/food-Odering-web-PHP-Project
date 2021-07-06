<!-- header php joined -->

<?php
//session_start();
include('includes/header.php');
require_once('./database.php');

$items;
//if(isset($_SESSION['user_name'])){
$query = "SELECT * FROM items WHERE category='3'";
$row = mysqli_query($database, $query);
$items = mysqli_fetch_all($row);
//print_r($items);
//}

$additional_items;
//if(isset($_SESSION['user_name'])){
$query1 = "SELECT * FROM additional_items WHERE cat_id='6'";
$row1 = mysqli_query($database, $query1);
$additional_items = mysqli_fetch_all($row1);
//print_r($items);
//}


?>


<title> Burgers </title>
<!-- hero text -->
<div class="container-fluid" style="position: relative;">
    <img src="images/burgerss.jpg " alt="Snow " style="width:100%  ; height: 50vh; ">
    <div style="padding: 0px 0px 100px 0px ;  " class="carousel-caption ">
        <h2>Burgers</h2>
        <h3 style="color:#EDBB00 "><i><b>Burgers with mavelous tastes around the world</b></i></h3>

    </div>
</div>
<!-- end -->

<!-- cards--------------------------------------------------------------------------- -->

<div id="rice-type-selector" class="container mt-5">

    <div class="row ">
        <?php
        if (isset($items)) {
			
            foreach ($items as $item) {
				
                echo "<div class='col-lg-4 col-md-6 col-sm-6 mb-2'>";
                echo  "<form action='validation.php' method='post'>";
                echo   "<input style='display:none' type='text' name='item_id' value='$item[0]'  placeholder='item id' class='item_id'>";
                echo   "<input style='display:none' type='text' name='item_name' value='$item[1]'  placeholder='item name'>";
                echo "<div class='card text-center'>";
                echo " <div class='card-block'>";
                echo " <img src='$item[6]' alt='' class='img-fluid'>";
                echo " <div class='card-title'>";
                echo " <h4>$item[1]</h4>";
                echo " </div>";
                echo " <div class='card-text'>";
                echo "$item[2]";
                echo " </div>";
                echo "<hr>";
                //updated
                echo "<div class='container potion-container' style='display: flex;justify-content: space-evenly;'>";
                
                //updated
                echo "<select id='$item[0]'  name='portion' onchange='hello(this.value,this.id)' class='form-select portion' aria-label='Default select example' >";
                echo " <option  value='0' selected>potion</option>";
                echo " <option  value='$item[3]'>Small</option>";
                echo " <option  value='$item[4]'>Medium</option>";
                echo " <option  value='$item[5]'>Large</option>";
                echo " </select>";
				echo "<input type='hidden' name='price' id='price_$item[0]'>";
                echo "<div style='display:flex' class='ml-1'>";
                echo"<span class='label label-warning' >Quantity</span>";
                
                echo " <input class='form-select item_quantity'  type='number' max='10'  min='0'  name='item_quantity' id='$item[0]'>";
                echo " </div>";
                echo " </div>";


                //echo "<div class='container' style='display: flex;justify-content: center;'>";

                //updated
   
                
                //working module
                // echo "<select id='$item[0]'  name='select1' onchange='hello(this.value,this.id)' class='form-select ' aria-label='Default select example' >";
                // echo " <option id='janaka' value='0' selected>Select Quantity</option>";
                // echo " <option id='janaka' value='$item[3]' >1</option>";
                // echo " <option id='janaka' value='$item[4]'>2</option>";
                // echo " <option id='janaka' value='$item[5]'>3</option>";
                // echo " </select>";
                // echo " </div>";
                //working module end 
                //testing
                
                echo " <hr>";
                
                echo  "<h6>Price : <b>LKR </b><b id='$item[0]_hi'>0</b><b>.00</b></h6>";
                

                echo " <hr>";
                //----------------------------- button for item customization----------------------------------------- --
                              
               
        ?>
            
                
                <?php   foreach ($additional_items as $additional_item) { ?>
                   
                    <div class="input-group row ml-0.5 " style="justify-content: center;">
                       <div class="input-group-prepend flex-fill col-5 ">
                           <div class="input-group-text form-control " style="background-color: #F7DC6F;">
                               <label for="" class=" mb-0">
                               
                               <input type="radio" onclick="AdditionalItem(<?php  echo $additional_item[2]; ?>, <?php  echo $additional_item[0]; ?>)" value='<?php  echo "$additional_item[1]"; ?>' id="<?php  echo "$additional_item[1]"; ?>" name="additional_item" aria-label="Checkbox for following text input" /><?php  echo "$additional_item[1]"; ?></label>
                              
                           </div>
                           
                       </div>
                       
                    </div>

                   

            <?php }?>
            <div  id= "regular_combo_blaster" class="input-group-append col-5">

                          
                          <select class="form-select" name="additional_item_quantity" id="<?php echo  'additional_item_quantity_'.$item[0];?>"  onclick="AdditionalItem1()">
                             <option id="<?php echo $additional_item[0] .'_regular' ?> "value="" selected>select addon</option>
                             
                         </select>
                     </div> 
             
        <?php
                
                //---------------------------- button for item customization end----------------------------------------- 
              
                echo " <hr>";
                // <a href='#' class='btn btn-danger' style='margin:2px'>view category</a> 

                echo "<input class='btn btn-success' style='margin:2px' type='submit' value='Order Now' name='order'> ";

                echo " </div>";
                echo " </div>";
                echo "</form>";
                echo "</div>";
            }
			
        }

        ?>
<!--  <SCript>
                $("[type='number']").keypress(function (evt) {
                evt.preventDefault();
                });
            
            </SCript>  -->
    </div>
	
</div>
<!--  cards end--------------------------------------------------------------------------- -->
<script src="hello.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- footer php joined -->
<?php include('includes/footer.php'); ?>
<!-- end -->

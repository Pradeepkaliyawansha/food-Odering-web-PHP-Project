<!-- header php joined -->


<?php
//include('includes/header.php');
//session_start();
// $count;
// if(isset($_SESSION['user_cart'])){
//     $count = $_SESSION[]
// }
?>

<?php
//ini_set('session.cookie_samesite', 'None');  move to header.php
//ini_set('session.cookie_secure', 'true');
//session_start();
include('includes/header.php');
// $_SESSION['user_cart'];
require_once('./database.php');

$catagories;
//if(isset($_SESSION['user_name'])){
$query = "SELECT * FROM categories";
$row = mysqli_query($database, $query);
$catagories = mysqli_fetch_all($row);
//print_r($items);
//}

?>

<title> home </title>
<!-- end -->

<!-- ninda dammaaa -->



<!-- slider -->
<div class="slider">
  <div class=""></div>
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
      <div class="carousel-item active">

        <div class="banner"><img src="images/img1.jpg" id="im1" alt="1"></div>
        <div class="carousel-caption" style="margin-bottom: 15%;">
          <h2>Healthy & <span>Delicious</span></h2>
          <h3>Food With Unique Sri Lankan Taste</h3>
          <p><a  class="cat" href="#category">View More</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="banner"><img src="images/img2.jpg" id="im1" alt="2"></div>
        <div class="carousel-caption"style="margin-bottom: 15%;">
        <h2>Healthy & <span>Delicious</span></h2>
          <h3>Food With Unique Sri Lankan Taste</h3>
          <p ><a class="cat"  href="#category">View More</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="banner"><img src="images/img3.jpg" id="im1" alt="3"></div>
        <div class="carousel-caption"style="margin-bottom: 15%;">
        <h2>Healthy & <span>Delicious</span></h2>
          <h3>Food With Unique Sri Lankan Taste</h3>
          <p ><a class="cat"  href="#category">View More</a></p>
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>

</div>
<!-- slder end -->

<!-- categories text -->
<div class="container">
  <a name='category'></a>
  <h2 class="text-center mt-3"><strong>Categories</strong></h2>
  <p class="text-center mt-3">Mankind is not lives for food. But they need food for live. As Nimdaas's, we are offering healthy and delicious food for the mankind with ensuring their health and add a smile for the end of their mouth. </p>
</div>
<!-- end -->

<!-- category items ------------------------->
<div class="container mt-5">
  <div class="row ">
    <?php
    if (isset($catagories)) {
      foreach ($catagories as $category) {

        echo "<div class='col-md-3 col-sm-6 mb-2'>";

        echo "<di class='card text-center'>";
        echo "<div class='card-block'>";
        echo " <img src='$category[2]' alt='' class='img-fluid'>";
        echo " <div class='card-title'>";
        echo " <h4>$category[1]</h4>";
        echo " </div>";
        echo "<div class='card-text'>";
        echo "$category[3]";
        echo "</div>";
        echo " <a href='$category[1].php' class='btn btn-warning' style='margin:2px'>view category</a>";
        echo " </div>";
        echo " </di>";
        echo " </div>";
      }
    }
    ?>
  </div>
</div>

<!-- end -->
<script src="js/bootstrap.js"></script> 
<!-- footer php joined -->
<?php include('includes/footer.php'); ?>
<!-- end -->
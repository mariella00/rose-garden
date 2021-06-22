<?php
session_start();
include '../include/config.php';
if(isset($_SESSION['role'])){
    if($_SESSION['role'] != "admin"){
        header('Location: ../admin/home.php');
    }
}
else{
    header('Location: ../index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!--using FontAwesome--------------->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/all.min.css"> <!-- //offline icons  -->

   	<title>Rose Garden | Online Shop</title>
  <!-- slick slider -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
     <link rel="stylesheet" type="text/css" href="../css/admin.css"><!-- //main styles-->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/><!-- //dataTable styles-->
	<!--js-link--------------------->
  <script src="../js/Jquery.js"></script>
  </head>

    <body>
    <?php include('../include/nav-ad.php'); ?>

    <div class="links">
      <a href="home.php">
        <i class="fas fa-home"></i>
        <span>Home</span></a>>
    </div>

        <div class="info">
            <p>ADMINISTRATOR&nbsp <small>DASHBOARD</small></p> 
            <hr>
            <ul class="service">
            <br><br>
              <li><i class="fas fa-seedling fa-5x"></i>
              <br><h3>PRODUCTS</h3>
              <a href="plants-prod.php">PLANTS&nbsp;</a>|
              <a href="pots-prod.php">POTS&nbsp;</a>|
              <a href="soil-prod.php">SOIL</a></li>
              
              <li><i class="fas fa-cart-arrow-down fa-5x" ></i>
              <br><h3>ORDERS</h3>
              <a href="manage-orders.php">MANAGE</a></li>
              
              <li><i class="fas fa-users fa-5x"></i>
              <br><h3>USERS</h3>
              <a href="manage-users.php">MANAGE</a></li>
                      
              <li><i class="fas fa-star-half-alt fa-5x"></i>
              <br><h3>REVIEWS</h3>
              <a href="manage-reviews.php">MANAGE</a></li>
              </ul>
        </div>


<?php include '../include/footer.html';?> 
<?php include '../include/scripts.php';?> 

  </body>
</html>

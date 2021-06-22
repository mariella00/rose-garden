<?php
session_start();
include '../include/config.php';
if(isset($_SESSION['role'])){
    if($_SESSION['role'] != "user"){
        header('Location: ../users/home.php');
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
     <link rel="stylesheet" type="text/css" href="../css/users.css">
	<!--js-link--------------------->
  <script src="../js/Jquery.js"></script>
  </head>


<body>
<?php include('../include/nav.php'); ?>

<!-- Plant Menu------------------------------------ -->
<?php $results = mysqli_query($conn, "SELECT * from plant_products"); ?>
    <?php while ($row = mysqli_fetch_array($results)) { ?>
<!-- 1 -->

<section class="product-list">
      <div class="product-container">
        <input type="hidden" name="id" value="<?php echo $row['plant_id']; ?>">
          <div class="card">

            <div class="image">
              <a href="us-plants-desc.php?next=<?php echo $row['plant_id']; ?>">
                  <img src="../<?php echo $row['plant_image']; ?>">
              </a> 
            </div>
            <div>
            <a href="us-plants-desc.php?next=<?php echo $row['plant_id']; ?>" style="text-decoration: none;  color: black;">
                <div class="title"><?php echo $row['plant_name']; ?></div>
            </a>
            <div class="text"><?php echo $row['plant_sciname']; ?></div>
            </div >

            <div class="cart-price">   
              <div class="price">
                <span>₱<?php echo $row['plant_price']; ?></span>
              </div>
              <div class="cart">
              <a href="us-plants-desc.php?next=<?php echo $row['plant_id']; ?>"><button type="submit" class="btn btn-success"  style="width: 118px; height: 40px; border-radius: 5px; ">
              <span class="btn-lbl">View info</span></button></a> 
              </div>
            </div>
          </div>
          </div>

      <?php } ?>
</section> 
<?php include '../include/footer.html' ; ?> 

<!--using JQuery--------------->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<!-- Slick slider CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" ></script>
    <script type="text/javascript"> 
       $(".slider").slick({
          slidesToShow: 5,
          infinite: false,
          slidesToScroll: 3,
          dots: false,
          autoplay: false
      })
</script>
  </body>
</html>
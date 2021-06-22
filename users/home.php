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

<!--image slider---------->
<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/banner.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/bg2.png" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
&nbsp;&nbsp;&nbsp;

 <!--services------------------------->
 <section class="services">
  <div class="services-box">
      <i class="fab fa-paypal"></i>
      <span>PayPal or Pickup</span>
      <p>Pay on your comfort</p>
  </div>
 
  <div class="services-box">
      <i class="fas fa-headphones-alt"></i>
      <span>Chat us your inquiry</span>
      <p>Social media? Phone number? We got it</p>
  </div>

  <div class="services-box">
     <i class="fas fa-shipping-fast"></i>
      <span>Fast Delivery</span>
      <p>Less hassle delivery</p>
  </div>
  
  <div class="services-box">
     <i class="fas fa-tags"></i>
      <span>Offer Discounts</span>
      <p>Get discounts on bulk orders</p>
  </div>
</section>
&nbsp;&nbsp;&nbsp;

<!--product-categories-slider---------------------->
  	<div class="feature-heading">
        <h2>PRODUCTS</h2>
    </div>
     
    <div class="slider">
    <div class="items">
      <img src="../img/plants/p1.png" alt="1">
      <h4>Chinese Evergreen</h4>
      <h5>Aglaonema commutatum schott</h5>
    </div>

     <div class="items">
      <img src="../img/plants/p9a.png" alt="2">
       <h4>Variegated Mint Leaf</h4>
      <h5>Plectranthus madagascariensis</h5>
    </div>

     <div class="items">
      <img src="../img/plants/p92a.png" alt="3">
       <h4>Christmas Tree Plant</h4>
      <h5>Kalanchoe lacianita</h5>
    </div>

     <div class="items">
      <img src="../img/plants/p95a.png" alt="4">
       <h4>Pandakaki</h4>
      <h5>Tabernaemontana mindanaensis</h5>
    </div>

    <div class="items">
      <img src="../img/plants/q02a.png" alt=5>
      <h4>Pink Anana</h4>
      <h5>Ananas lucidus</h5>
    </div>

    <div class="items">
      <img src="../img/pots/g.png" alt="6">
       <h4>Plastic Pot</h4>
      <h5>#9027</h5>
    </div>

    <div class="items">
      <img src="../img/pots/3.png" alt="7">
       <h4>Clay Pot</h4>
      <h5>Fern</h5>
    </div>

       <div class="items">
      <img src="../img/pots/L.png" alt="8">
      <h4>Plastic Pot</h4>
      <h5>Go 2007-M</h5>
    </div>

       <div class="items">
      <img src="../img/pots/b.png" alt="9">
       <h4>Plastic Pot</h4>
      <h5>Mini Lavender</h5>
    </div>

       <div class="items">
      <img src="../img/pots/t.png" alt="10">
        <h4>Plastic Pot</h4>
      <h5>Sense & Style 882</h5>
    </div>

      <div class="items">
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
     <a href="#"><h2>See more..</h2></a>
    </div>
  </div>

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

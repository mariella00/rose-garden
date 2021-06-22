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
    <link rel="stylesheet" type="text/css" href="css/all.min.css"> <!-- //offline icons  -->

    <title>Rose Garden | Online Shop</title>
  <!-- slick slider -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
     <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--js-link--------------------->
  <script src="js/Jquery.js"></script>
  </head>

<body>
<nav> 
    <!--menu-bar----------------------------------------->
    <div class="navigation">
        <!--logo------------>
        <a href="#" class="logo"><img src="img/logo.png"></a>
        <!--menu-icon------------->
        <div class="toggle"></div>
        <!--menu----------------->
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="plants.php">Plants</a></li>
            <li><a href="pots.php">Pots</a></li>
            <li><a href="soil.php">Soil</a></li>
        </ul>
  <!--CART----------------->
    <div class="cart">
      <a href="include/login.php"><i class="fas fa-shopping-cart"><span class="num-cart-product">0</span></i></a>
    </div>
  <!--SEARCH----------------->
  <form method="post" action="search.php">
    <div class="search-box">
      <input class="search-txt" type="text" name="input-search" placeholder="Type to search" required>
      <button style="background-color: white; border: none;" name="submitsearch">
      <a class="search-btn" href="#">
      <i class="fas fa-search" ></i></a></button>
    </div>
  </form>
  <!--USER----------------->        
    <div class="right">
      <a href="include/login.php" class="user"><i class="far fa-user"></i></a>
    </div>  
</div>
</nav>

<!--image slider---------->
<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/banner.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/bg2.png" alt="Second slide">
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
      <img src="img/plants/p1.png" alt="1">
      <span>Chinese Evergreen</span>
      <h5>Aglaonema commutatum schott</h5>
    </div>

     <div class="items">
      <img src="img/plants/p9a.png" alt="2">
       <span>Variegated Mint Leaf</span>
      <h5>Plectranthus madagascariensis</h5>
    </div>

     <div class="items">
      <img src="img/plants/p92a.png" alt="3">
       <span>Christmas Tree Plant</span>
      <h5>Kalanchoe lacianita</h5>
    </div>

     <div class="items">
      <img src="img/plants/p95a.png" alt="3">
       <span>Pandakaki</span>
      <h5>Tabernaemontana mindanaensis</h5>
    </div>

    <div class="items">
      <img src="img/plants/q02a.png" alt="3">
      <span>Pink Anana</span>
      <h5>Ananas lucidus</h5>
    </div>

    <div class="items">
      <img src="img/pots/g.png" alt="3">
       <span>Plastic Pot</span>
      <h5>#9027</h5>
    </div>

    <div class="items">
      <img src="img/pots/c.png" alt="3">
       <span>Plastic Pot</span>
      <h5>GQ 886</h5>
    </div>

       <div class="items">
      <img src="img/pots/L.png" alt="3">
      <span>Plastic Pot</span>
      <h5>Go 2007-M</h5>
    </div>

       <div class="items">
      <img src="img/pots/b.png" alt="3">
       <span>Plastic Pot</span>
      <h5>Mini Lavender</h5>
    </div>

       <div class="items">
      <img src="img/pots/t.png" alt="3">
        <span>Plastic Pot</span>
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

  <?php include 'include/footer.html' ; ?> 
  <?php include 'include/scripts.php' ; ?> 

<!--using JQuery--------------->
<script
  src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

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
<?php include ('include/config.php')  ?>
<?php 
    if (isset($_GET['next'])) {
        $id = $_GET['next'];

        $sql = "SELECT * FROM soil_products WHERE soil_id = '$id'";
        $results = mysqli_query($conn, $sql);
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
    <div class="search-box">
      <input class="search-txt" type="text" name="" placeholder="Type to search">
      <a class="search-btn" href="#">
      <i class="fas fa-search" ></i></a>
    </div>
  <!--USER----------------->        
    <div class="right">
      <a href="include/login.php" class="user"><i class="far fa-user"></i></a>
    </div>  
</div>
</nav>

  <section>
   <?php while ($row = mysqli_fetch_array($results)) {?>

  <div class="product-pic">
           <div class="container">
          <div class="slider-for">
            <div class="p1"><img src="  <?php echo $row['soil_image']; ?>" width="500px" height="auto"></div>
            <div class="p1"><img src="  <?php echo $row['soil_var_plastic_img']; ?>" width="500px" height="auto"></div>
             <div class="p1"><img src="  <?php echo $row['soil_var_sack_img']; ?>" width="500px" height="auto"></div>
          </div>

             <div class="slider-nav">
            <div class="p2"><img src=" <?php echo $row['soil_image']; ?>" width="100px" height="auto"></div>
            <div class="p2"><img src=" <?php echo $row['soil_var_plastic_img']; ?>" width="100px" height="auto"></div>
            <div class="p2"><img src=" <?php echo $row['soil_var_sack_img']; ?>" width="100px" height="auto"></div>
        </div>
</div>
        </div>
  <div class="product-description">
    <div class="product-name">
        <?php echo $row['soil_name']; ?>

    </div>
     <div class="price">
          <span>₱ &nbsp;<?php echo $row['soil_price']; ?></span>
        </div><br>

    <div class="product-des">
        <?php echo $row['soil_description']; ?>
        <div class="product-link" style="padding:0;">
        <br>Reference:<br>
          <a href="<?php echo $row['soil_link']; ?>"><?php echo $row['soil_link']; ?></a> 
      </div>
        <br>
        <br>
        Plastic<br>
        Price: <?php echo $row['soil_var_plastic_price']; ?><br>
        Stocks: <?php echo $row['soil_var_plastic_stocks']; ?><br>
        <br>
        Sack<br>
        Price: <?php echo $row['soil_var_sack_price']; ?> <br>
        Stocks: <?php echo $row['soil_var_sack_stocks']; ?> <br>
    </div>
    
    <div class="add-to-cart">    
      <a href="include/login.php">
      <button type="submit" class="btn btn-success" style="border-radius: 5px; width: 200px;" > Add to cart &nbsp;
      <i class="fas fa-cart-plus "></i></button></a>
    </div>
   
    </div>
  </div>
    <?php } ?>
  </section>

  <?php include 'include/scripts.php' ; ?>
  <?php include 'include/footer.html' ; ?> 

<!-- SLICK CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" ></script>
<script type="text/javascript"> 
// slick slider
  $(".slider").slick({
    slidesToShow: 5,
    infinite: false,
    slidesToScroll: 3,
    dots: true,
    autoplay: false
  })

// Slick synchslider
 $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  infinite: false,
  centerMode: true,
  focusOnSelect: true,
});
</script>
</script>
<!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
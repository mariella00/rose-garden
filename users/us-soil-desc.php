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

<section>
   <?php while ($row = mysqli_fetch_array($results)) {?>
<form action="us-soiladdtocart.php" method="post">

  <div class="product-pic">
           <div class="container">
          <div class="slider-for">
            <div class="p1"><img src="../<?php echo $row['soil_image']; ?>" width="500px" height="auto"></div>
            <div class="p1"><img src="../<?php echo $row['soil_var_plastic_img']; ?>" width="500px" height="auto"></div>
             <div class="p1"><img src="../<?php echo $row['soil_var_sack_img']; ?>" width="500px" height="auto"></div>
          </div>

             <div class="slider-nav">
            <div class="p2"><img src="../<?php echo $row['soil_image']; ?>" width="100px" height="auto"></div>
            <div class="p2"><img src="../<?php echo $row['soil_var_plastic_img']; ?>" width="100px" height="auto"></div>
            <div class="p2"><img src="../<?php echo $row['soil_var_sack_img']; ?>" width="100px" height="auto"></div>
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
        
     <!-- VARIATION-->
<div data-toggle="buttons">
  <div class="btn-group-vertical">
  
  <div>
  <label class="btn btn-outline-success">
      <input type="radio" name="variation" id="type" class="sr-only" <?php if (isset($variation) && $variation=="Plastic") echo "checked";?> value="Plastic" required>₱ <?php echo $row['soil_var_plastic_price']; ?> / Plastic
    </label>
      <?php echo "Stocks:   " . $row['soil_var_plastic_stocks']; ?>
  </div>

  <div>
  <label class="btn btn-outline-success">
      <input type="radio" name="variation" id="type" class="sr-only" <?php if (isset($variation) && $variation=="Sack") echo "checked";?> value="Sack" required>₱ <?php echo $row['soil_var_sack_price']; ?> / Sack
  </label>
      <?php echo "Stocks:   " . $row['soil_var_sack_stocks']; ?>
  </div>                   

  </div>
  </div>
  </div> <br>

<!-- VARIATION-->
<div style="margin-left:4%;">
<?php
  $tf= $row['soil_var_plastic_stocks'];
  $td= $row['soil_var_sack_stocks'];

  $max = $tf + $td;
?>

Quantity: 
    <input style="width:20%;" type="number" name="quantity" value="" min="1" max="<?php echo $max; ?>" placeholder="Quantity" required ?>
    </div>
    <input type="hidden" name="soilID" value="<?php echo $row['soil_id']; ?>">

    
    <div class="add-to-cart">    
      <button type="submit" class="btn btn-success" name="soilAdd"style="border-radius: 5px; width: 200px;" > Add to cart &nbsp;
      <i class="fas fa-cart-plus "></i></button>
    </div>
   
  </div>
  </div>
    <?php } ?>
  </section>
  <?php include '../include/footer.html' ; ?> 

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
  </body>
</html>
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

        $sql = "SELECT * FROM pots_products WHERE pots_id = '$id'";
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

  <div class="product-pic">
    <div class="container">
      <div class="slider-for">
        <div class="p1"><img src="../<?php echo $row['pots_image1']; ?>" width="500px" height="auto"></div>
        <div class="p1"><img src="../<?php echo $row['pots_image2']; ?>" width="500px" height="auto"></div>
        <div class="p1"><img src="../<?php echo $row['pots_image3']; ?>" width="500px" height="auto"></div>       
      </div>

      <div class="slider-nav">
        <div class="p2"><img src="../<?php echo $row['pots_image1']; ?>" width="100px" height="auto"></div>
        <div class="p2"><img src="../<?php echo $row['pots_image2']; ?>" width="100px" height="auto"></div>
        <div class="p2"><img src="../<?php echo $row['pots_image3']; ?>" width="100px" height="auto"></div>     
      </div>
    </div>
  </div>

  <div class="product-description">
    <div class="product-name">
    <label style="font-weight:bold; font-size:23px;"><?php echo $row['pots_category'];?></label>
    <small style="font-size:17px;"><?php echo $row['pots_name']; ?></small>
    
    <form action="us-potsaddtocart.php" method="post">
    </div>
    <br>
    <div class="price">
          <span>₱&nbsp;<?php echo $row['pots_price']; ?></span><br>
          <span>Size: <?php echo $row['pots_size']; ?></span>
    </div>

    <div class="product-des">  
      <br><br><br>
<!-- VARIATION -->
<div data-toggle="buttons">
  <div class="btn-group-vertical">
  <label style="font-weight:bold; font-size:18px;">Variations</label>
    <div>
<?php if ($row['pots_color1'] != ""){ ?>
      <label class="btn btn-outline-success">
        <input type="radio" name="variation" id="type" value="<?php echo $row['pots_color1'];?>" <?php if (isset($variation) && $variation=$color1) echo "checked";?>
          value="<?php echo $row['pots_color1'];?>" class="sr-only" required> <?php echo $row['pots_color1']; ?>
      </label>
      
      <input type="hidden" name="varImage1" value="<?php echo $row['pots_image1']; ?>">
      <?php  echo "Stocks: ".$row['pots_stocks1']; } ?>          
    </div>

    <div>
<?php if ($row['pots_color2'] != ""){ ?>
      <label class="btn btn-outline-success">
        <input type="radio" name="variation" id="type" value="<?php echo $row['pots_color2'];?>" <?php if (isset($variation) && $variation=$color1) echo "checked";?>
          value="<?php echo $row['pots_color2'];  ?>" class="sr-only" required> <?php echo $row['pots_color2']; ?>
      </label>
      
      <input type="hidden" name="varImage2" value="<?php echo $row['pots_image2']; ?>">
      <?php  echo "Stocks: ".$row['pots_stocks2']; } ?>
    </div>

    <div>
<?php if ($row['pots_color3'] != ""){ ?>
      <label class="btn btn-outline-success">
        <input type="radio" name="variation" id="type" value="<?php echo $row['pots_color3'];  ?>" <?php if (isset($variation) && $variation=$color1) echo "checked";?>
          value="<?php echo $row['pots_color3'];  ?>" class="sr-only" required> <?php echo $row['pots_color3']; ?> 
      </label>
      
      <input type="hidden" name="varImage3" value="<?php echo $row['pots_image3']; ?>">
      <?php  echo "Stocks: ".$row['pots_stocks3']; } ?>                   
  </div>
                </div>
                </div>
            </div>
      </div>
      <br>  
<!-- QUANTITY-->
<div style="margin-left:53%;">
<?php
  $tf= $row['pots_stocks1'];
  $td= $row['pots_stocks2'];
  $tg= $row['pots_stocks3'];
  
  $max = $tf + $td + $tg;
?>        
  Quantity: <input style="width:30%;" type="number" name="quantity" value="" min="1" max="<?php echo $max; ?>"
        placeholder="Quantity" required ?>
</div>
    
    <input type="hidden" name="potID" value="<?php echo $row['pots_id']; ?>">

<div class="add-to-cart" style="margin-left:52%;">
<button type="submit" class="btn btn-success" name="ptsAdd" style="border-radius: 5px; width: 200px;">
  Add to cart &nbsp;<i class="fas fa-cart-plus "></i></button>
</div>
   
</div>
</div>
<?php } ?>
</section>
</form>

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
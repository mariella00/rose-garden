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

        $sql = "SELECT * FROM plant_products WHERE plant_id = '$id'";
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

<form action="us-plntaddtocart.php" method="post">
  <div class="product-pic">
      <div class="container">
          <div class="slider-for">
            <div class="p1"><img src="../<?php echo $row['plant_image']; ?>" width="500px" height="auto"></div>
            <div class="p1"><img src="../<?php echo $row['plant_angle']; ?>" width="500px" height="auto"></div>
          </div>

          <div class="slider-nav">
            <div class="p2"><img src="../<?php echo $row['plant_image']; ?>" width="100px" height="auto"></div>
            <div class="p2"><img src="../<?php echo $row['plant_angle']; ?>" width="100px" height="auto"></div>
        </div>
      </div>
  </div>

  <div class="product-description">
    <div class="product-name">
        <?php echo $row['plant_name']; ?>

    </div>
    <div class="product-sciname">
        <?php echo $row['plant_sciname']; ?>
    </div>
     <div class="price">
          <span>₱ &nbsp;<?php echo $row['plant_price']; ?></span>
        </div><br>

    <div class="product-des">
        <?php echo $row['plant_description']; ?>
        <br><br>
        <div class="product-link">
        Reference:<br>
       <a href="<?php echo $row['plant_link']; ?>"><?php echo $row['plant_link']; ?></a> 
    </div>
        <br>
        Stocks:   <?php echo $row['plant_stocks']; ?>
        <br>
        <br>

<?php
  $max = $row['plant_stocks'];
?>
         Quantity: 
         <input style="width:20%;" type="number" name="quantity" value="" min="1" max="<?php echo $max; ?>"
         placeholder="Quantity" required ?>
    </div>
    <!-- ID-->
    <input type="hidden" name="plntID" value="<?php echo $row['plant_id']; ?>">
    
   
    <div class="add-to-cart">    
      <button type="submit" class="btn btn-success" name="plntAdd" style="border-radius: 5px; width: 200px;" > Add to cart &nbsp;<i class="fas fa-cart-plus "></i></button> 
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
<?php include ('include/config.php')  ?>

 <?php if(isset($_POST['submitsearch'])){
      $search = $_POST['input-search'];
      $sql = "SELECT plant_image, plant_name , plant_price FROM plant_products  WHERE plant_name LIKE '%$search%'
            UNION 
            SELECT pots_image1, pots_name, pots_price FROM pots_products    WHERE pots_name LIKE '%$search%'
                UNION 
                SELECT soil_image, soil_name, soil_price FROM soil_products  WHERE soil_name LIKE '%$search%'";
    }else{
      $sql = "SELECT plant_image,  plant_name , plant_price FROM plant_products  
            UNION 
            SELECT pots_image1, pots_name, pots_price FROM pots_products   
                UNION 
                SELECT soil_image,  soil_name, soil_price FROM soil_products ";
      $search ="";
    }
      $results = mysqli_query($conn, $sql );
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

  <!--USER----------------->        
    <div class="right">
      <a href="include/login.php" class="user"><i class="far fa-user"></i></a>
    </div>  
</div>
</nav>


<div class="search-boxx">
  <div class="search-box-search">
    
<form class="example" action="search.php" method="post">
  <input type="text" placeholder="Search.." name="input-search" value="<?php echo $search ?>" required>
  <button type="submit" name="submitsearch"><i class="fa fa-search"></i></button>
</form>
  </div>
</div>        

<div class="for-table">
  
<table class="t-table">
  <thead>
    
  <tr>
    <th class="t-header">Image</th>
    <th class="t-header">Name</th>
    <th class="t-header">Price</th>
  </tr>
  </thead>

  <?php if (mysqli_num_rows($results) <= 0) {
  echo "<div class='no-results'>No result found.</div>";
}?>



<?php while ($row = mysqli_fetch_array($results)) { ?>


  <tr>
    <td>
      <img class="t-row" src="<?php echo $row['plant_image']; ?>">
    </td>

    <td>
      <?php echo $row['plant_name']; ?>
    </td>

    <td>
      ₱<?php echo $row['plant_price']; ?>.00
    </td>
  </tr>



<?php } ?>
</table>
</div>

  <?php include 'include/footer.html' ; ?> 
  <?php include 'include/scripts.php' ; ?> 


  </body>
</html>
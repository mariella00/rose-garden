<?php include('include/config.php'); ?>


<?php

if(isset($_POST['go']))
{
    $search = $_POST['search'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM soil_products WHERE soil_name LIKE '%$search%'";
    $search_result = filterTable($query);
       $queryResult = mysqli_num_rows($search_result);
    }
 else {
    $query = "SELECT * FROM soil_products";
    $search_result = filterTable($query);

}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "rosegarden");
    $filter_Result = mysqli_query($connect, $query);

    return $filter_Result;
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
   <form method="post" action="soil.php">
            <div class="search-box">
                <input class="search-txt" type="text" name="search" placeholder="Search in soil">
               <button style="background-color: white; border: none;" name="go"> <a class="search-btn" href="#">
                <i class="fas fa-search" ></i></a>
                </button>
            </div>
            </form>
  <!--USER----------------->        
    <div class="right">
      <a href="include/login.php" class="user"><i class="far fa-user"></i></a>
    </div>  
</div>
</nav>

<?php if (mysqli_num_rows($search_result) <= 0) {
  echo "<div class='no-result'>No result found.</div>";
}?>

<!-- Soil Menu------------------------------------ -->
<?php while($row = mysqli_fetch_array($search_result)):?>
<!-- 1 -->
<section class="product-list">
 
      <div class="product-container">
        <input type="hidden" name="id" value="<?php echo $row['soil_id']; ?>">
          <div class="card">

            <div class="image">
              <a href="soil_description.php?next=<?php echo $row['soil_id']; ?>">
                  <img src="<?php echo $row['soil_image']; ?>">
              </a> 
            </div>
            <div>
            <a href="soil_description.php?next=<?php echo $row['soil_id']; ?>" style="text-decoration: none;  color: black;">
                <br><div class="title"><?php echo $row['soil_name']; ?></div>
            </a>
            </div >

            <div class="cart-price">   
              <div class="price">
                <span>₱<?php echo $row['soil_price']; ?></span>
              </div><br>

              <div class="cart">
              <a href="soil_description.php?next=<?php echo $row['soil_id']; ?>">
              <button type="submit" class="btn btn-success"  style="width: 118px; height: 40px; border-radius: 5px; ">
              <span class="btn-lbl">View info</span></button> </a>
              </div>

            </div>
          </div>
          </div>

       <?php endwhile;?>
</section> 


  <?php include 'include/scripts.php' ; ?>
  <?php include 'include/footer.html' ; ?>  


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
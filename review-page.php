

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
     <link rel="stylesheet" type="text/css" href="css/users.css">
      <link rel="stylesheet" type="text/css" href="css/review.css">
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


  <section>
  <div class="content">
      <h2>Overall shopping experience</h2>
      <div class="reviews"></div>
<script>
const reviews_page_id = 1;
fetch("reviews.php?page_id=" + reviews_page_id).then(response => response.text()).then(data => {
  document.querySelector(".reviews").innerHTML = data;
  document.querySelector(".reviews .write_review_btn").onclick = event => {
    event.preventDefault();
    document.querySelector(".reviews .write_review").style.display = 'block';
    document.querySelector(".reviews .write_review input[name='name']").focus();
  };
  document.querySelector(".reviews .write_review form").onsubmit = event => {
    event.preventDefault();
    fetch("reviews.php?page_id=" + reviews_page_id, {
      method: 'POST',
      body: new FormData(document.querySelector(".reviews .write_review form"))
    }).then(response => response.text()).then(data => {
      document.querySelector(".reviews .write_review").innerHTML = data;
    });
  };
});
</script>
    </div>
</section>


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
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
      <link rel="stylesheet" type="text/css" href="../css/review.css">
     
	<!--js-link--------------------->
  <script src="../js/Jquery.js"></script>
  </head>


<body>
<?php include('../include/nav.php'); ?>

  <section>
  <div class="content">
      <h2>Overall shopping experience</h2>
      <p>Leave your comments below</p>
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
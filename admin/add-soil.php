<?php
session_start();
include '../include/config.php';
include '../include/scripts.php';

if(isset($_SESSION['role'])){
    if($_SESSION['role'] != "admin"){
        header('Location: ../admin/home.php');
    }
}
else{
    header('Location: ../index.php');
}

if(isset($_POST['sadd'])){
    $name	    = $_POST['sname'];
    $desc	    = $_POST['sdesc'];
    $link	    = $_POST['slink'];
    $price	    = $_POST['sprice'];
    $spprice	= $_POST['spprice'];
    $spstocks	= $_POST['spstocks'];
    $ssprice	= $_POST['ssprice'];
    $ssstocks	= $_POST['ssstocks'];

    $img = "img/soil/".$_FILES['new_img']['name'];

    $check = mysqli_query($conn,"SELECT * FROM soil_products WHERE soil_name = '$name'");
    if (mysqli_num_rows($check) > 0){
        echo("<script>location.href='add-soil.php?error=Item already exists';</script>");
    }

    else {
        $soil_add = "INSERT into soil_products (soil_image, soil_name, soil_description,
        soil_link, soil_price, soil_var_plastic_price, soil_var_plastic_stocks, soil_var_sack_price,
        soil_var_sack_stocks) VALUES ('".$img."', '".$name."', '".$desc."','".$link."',
        '".$price."', '".$spprice."', '". $spstocks."', '".$ssprice."', '".$ssstocks."')";
        $add_run = mysqli_query($conn,$soil_add);
        
        if($add_run){
            $_SESSION['status'] = "Item added";
            $_SESSION['status_code'] = "success";
            header('Location: soil-prod.php');
            }
        }
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
     <link rel="stylesheet" type="text/css" href="../css/admin.css">
	<!--js-link--------------------->
  <script src="../js/Jquery.js"></script>
  </head>

    <body>
    <?php include('../include/nav-ad.php'); ?>

        <div class="links">
        <a href="home.php">
            <i class="fas fa-home"></i>
            <span>Home</span></a>>

        <a href="soil-prod.php">
        <span>Soil product</span></a>>

        <a href="add-soil.php">
        <span>Add soil</span></a>>
        </div>

    <div class="info">
            <p>EDIT SOIL INFORMATION</p><hr>
    </div>

    <?php if (isset($_GET['error'])) { ?>
    <p class="error" id="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

        <form method="post" enctype='multipart/form-data'>

            <label>IMAGE</label>
            <input type="file" name="new_img" value="" accept="image/*" required>
            
            <label>NAME</label>
			<input type="text" name="sname" required>

            <label>DESCRIPTION</label>
            <textarea  name="sdesc" required></textarea>

            <label>LINK</label>
			<input type="text" name="slink" required>

            <label>PRICE RANGE</label>
			<input type="text" name="sprice" required>
            <br>

            <label style="color:#167D39; font-weight:bold; font-size:20px;">VARIATIONS: PLASTIC</label>
            <div class="variations">
                <label>PRICE</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:80px;">STOCKS</label>
            </div>
            <div class="variations">
                <input type="number" name="spprice" min="1" required>&nbsp;&nbsp;&nbsp;
                <input type="number" name="spstocks" min="1" required>
            </div><br>

            <label style="color:#167D39; font-weight:bold; font-size:20px;">VARIATIONS: SACK</label>
            <div class="variations">
                <label>PRICE</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:80px;">STOCKS</label>
            </div>
            <div class="variations">
                <input type="number" name="ssprice" min="1" required>&nbsp;&nbsp;&nbsp;
                <input type="number" name="ssstocks" min="1" required>
            </div><br>
            

            <br><br>
            <a href="soil-prod.php" class="btn btn-danger">CANCEL</a> &nbsp;&nbsp;&nbsp;
            <input type="submit" class="btn btn-success" value="ADD" name="sadd"/>
        </form>

<?php include '../include/footer.html' ; ?> 
 
  </body>
</html>

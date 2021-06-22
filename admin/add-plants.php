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
        if(isset($_POST['padd'])){
            $name	= $_POST['pname'];
            $sname	= $_POST['psciname'];
            $desc	= $_POST['pdesc'];
            $link	= $_POST['plink'];
            $price	= $_POST['pprice'];
            $stocks	= $_POST['pstocks'];

            $img = "img/plants/".$_FILES['new_img']['name'];
        
            $check = mysqli_query($conn,"SELECT * FROM plant_products WHERE plant_name = '$name'");
                if (mysqli_num_rows($check) > 0){
                    echo("<script>location.href='add-plants.php?error=Item already exists';</script>");
                }
                
                else {
                    $plant_add = "INSERT into plant_products (plant_image, plant_name, plant_sciname, plant_description,
                    plant_link, plant_price, plant_stocks) VALUES ('".$img."', '".$name."', '".$sname."', '".$desc."','".$link."',
                    '".$price."', '".$stocks."')";
                    $add_run = mysqli_query($conn,$plant_add);
                    
                    if($add_run){
                        $_SESSION['status'] = "Item added";
                        $_SESSION['status_code'] = "success";
                        header('Location: plants-prod.php');
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

      <a href="plants-prod.php">
      <span>Plants product</span></a>>

      <a href="add-plants.php">
      <span>Add plants</span></a>>
    </div>

    <div class="info">
            <p>ADD PLANT</p><hr>
    </div>

    <?php if (isset($_GET['error'])) { ?>
    <p class="error" id="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

        <form method="post" enctype="multipart/form-data">
            <label>IMAGE</label>
            <input type="file" name="new_img" accept="image/*" required>
            
            <label>NAME</label>
			<input type="text" name="pname" required>

            <label>SCIENTIFIC NAME</label>
			<input type="text" name="psciname" required>

            <label>DESCRIPTION</label>
            <textarea  name="pdesc" required></textarea>

            <label>LINK</label>
			<input type="text" name="plink" required>

            <label>PRICE</label>
			<input type="number" name="pprice" min="1" required>

            <label>STOCKS</label>
			<input type="number" name="pstocks" min="1" required>
            <br><br>

            <a href="plants-prod.php" class="btn btn-danger">CANCEL</a> &nbsp;&nbsp;&nbsp;
            <input type="submit" class="btn btn-success" value="ADD" name="padd"/>
            </form>

<?php include '../include/footer.html' ; ?> 
 
  </body>
</html>

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
        if(isset($_POST['ptadd'])){
			$name	= $_POST['ptname'];
            $cat	= $_POST['ptcategory'];
            $size	= $_POST['ptsize'];
            $price	= $_POST['ptprice'];

            $var1stock = $_POST['pt1stocks'];
            $var2stock = $_POST['pt2stocks'];
            $var3stock = $_POST['pt3stocks'];

            $var1color = $_POST['pt1color'];
            $var2color = $_POST['pt2color'];
            $var3color = $_POST['pt3color'];

            $img = "img/pots/".$_FILES['new_img']['name'];
            $img2 = "img/pots/".$_FILES['new_img2']['name'];
            $img3 = "img/pots/".$_FILES['new_img3']['name'];

            $check = mysqli_query($conn,"SELECT * FROM pots_products WHERE pots_name = '$name'");
            if (mysqli_num_rows($check) > 0){
                echo("<script>location.href='add-pots.php?error=Item already exists';</script>");
            }  
            else {
                $pots_add = "INSERT into pots_products (pots_name, pots_category, pots_size, pots_price,
                pots_stocks1, pots_stocks2, pots_stocks3, pots_color1, pots_color2, pots_color3, pots_image1,  pots_image2,  pots_image3) VALUES ('".$name."', '".$cat."', '".$size."',
                '".$price."','".$var1stock."', '".$var2stock."', '".$var3stock."', '". $var1color."',
                '". $var2color."', '". $var3color."', '". $img."', '". $img2."', '". $img3."')";
                    $add_run = mysqli_query($conn,$pots_add);
                    
                    if($add_run){
                        $_SESSION['status'] = "Item added";
                        $_SESSION['status_code'] = "success";
                        header('Location: pots-prod.php');
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

        <a href="pots-prod.php">
        <span>Pots product</span></a>>

        <a href="add-pots.php">
        <span>Add pots</span></a>>
   
        </div>

    <div class="info">
            <p>EDIT POTS INFORMATION</p><hr>
    </div>

    <?php if (isset($_GET['error'])) { ?>
    <p class="error" id="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <form method="post" enctype="multipart/form-data">
            <label>NAME</label>
			<input type="text" name="ptname" required>
            
            <label>CATEGORY</label>
			<input type="text" name="ptcategory" required>

            <label>SIZE</label>
			<input type="text" name="ptsize" required>

            <label>PRICE</label>
			<input type="number" name="ptprice" min="1" required>
            
            <br>
            <label style="color:#167D39; font-weight:bold; font-size:23px; text-align:center;">VARIATIONS</label>
            <!--FIRST VARIATION -->
            <div class="variations">
                <label style="color:#167D39; font-weight:bold;">FIRST-</label>&nbsp;&nbsp;&nbsp;
                <label>IMAGE</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:120px;">COLOR</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:15px;">STOCKS</label>
            </div>

            <div class="variations">
            <input type="file" name="new_img" value="" accept="image/*" required>&nbsp;&nbsp;&nbsp;
            <input style="width:25%;" type="text" name="pt1color" required>&nbsp;&nbsp;&nbsp;
            <input  style="width:25%;" type="number" name="pt1stocks" min="1" required>
            </div>
          
            
            <!--SECOND VARIATION -->
            <div class="variations">
                <label style="color:#167D39; font-weight:bold;">SECOND-</label>&nbsp;&nbsp;&nbsp;
                <label>IMAGE</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:93px;">COLOR</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:15px;">STOCKS</label>
            </div>

            <div class="variations">
            <input type="file" name="new_img2" value="" accept="image/*">&nbsp;&nbsp;&nbsp;
            <input style="width:25%;" type="text" name="pt2color">&nbsp;&nbsp;&nbsp;
            <input  style="width:25%;" type="number" name="pt2stocks" min="1">
            </div>
         

            <!--SECOND VARIATION -->
            <div class="variations">
                <label style="color:#167D39; font-weight:bold;">THIRD-</label>&nbsp;&nbsp;&nbsp;
                <label>IMAGE</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:115px;">COLOR</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:15px;">STOCKS</label>
            </div>

            <div class="variations">
            <input type="file" name="new_img3" value="" accept="image/*">&nbsp;&nbsp;&nbsp;
            <input style="width:25%;" type="text" name="pt3color">&nbsp;&nbsp;&nbsp;
            <input  style="width:25%;" type="number" name="pt3stocks" min="1">
            </div>
         
            
            
          
            <br><br><br>
            <a href="pots-prod.php" class="btn btn-danger">CANCEL</a> &nbsp;&nbsp;&nbsp;
            <input type="submit" class="btn btn-success" value="ADD" name="ptadd"/>
        </form>

<?php include '../include/footer.html' ; ?> 
  </body>
</html>

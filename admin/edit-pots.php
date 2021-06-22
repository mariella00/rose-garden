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

	$did = intval($_GET['id']);
		if(isset($_POST['ptupdate'])){
            $cat	= $_POST['ptcategory'];
			$name	= $_POST['ptname'];
            $size	= $_POST['ptsize'];
            $price	= $_POST['ptprice'];

            $var1stock = $_POST['pt1stocks'];
            $var2stock = $_POST['pt2stocks'];
            $var3stock = $_POST['pt3stocks'];

            $var1color = $_POST['pt1color'];
            $var2color = $_POST['pt2color'];
            $var3color = $_POST['pt3color'];

            $oldimg = $_POST['old_img'];
            $img = $_FILES['new_img']['name'];

            $oldimg2 = $_POST['old_img2'];
            $img2 = $_FILES['new_img2']['name'];

            $oldimg3 = $_POST['old_img3'];
            $img3 = $_FILES['new_img3']['name'];

            //check if there is a pic or not for 1st var//
            if($img != ''){
                $update_img = "img/pots/".$_FILES['new_img']['name'];
            }
            else{
                $update_img =  $oldimg;
            }
             //check if there is a pic or not for 2nd var//
            if($img2 != ''){
                $update_img2 = "img/pots/".$_FILES['new_img2']['name'];
            }
            else{
                $update_img2 =  $oldimg2;
            }

             //check if there is a pic or not for 3rd var//
             if($img3 != ''){
                $update_img3 = "img/pots/".$_FILES['new_img3']['name'];
            }
            else{
                $update_img3 =  $oldimg3;
            }
			
         $query = "UPDATE pots_products SET pots_name = '$name',  pots_category = '$cat', pots_size = '$size',
         pots_price = '$price', pots_stocks1 = '$var1stock', pots_stocks2 = '$var2stock', pots_stocks3 = '$var3stock',
         pots_image1 = '$update_img', pots_image2 = '$update_img2', pots_image3 = '$update_img3',
         pots_color1 = '$varcolor', pots_color2 = '$var2color', pots_color3 = '$var3color' WHERE pots_id = '$did'"; 
        $query_run = mysqli_query($conn,$query);
	
                if($query_run){
                    move_uploaded_file($_FILES['new_img']['tmp_name'],$update_img);
                    move_uploaded_file($_FILES['new_img2']['tmp_name'],$update_img2);
                    move_uploaded_file($_FILES['new_img3']['tmp_name'],$update_img3);
                    
                    $_SESSION['status'] = "Update succesful";
                    $_SESSION['status_code'] = "success";
                    header('Location: pots-prod.php');
                }
                else{
                    $_SESSION['status'] = "Update Error";
                    $_SESSION['status_code'] = "error";
                    header('Location: edit-pots.php');
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
        </div>

    <div class="info">
            <p>EDIT POTS INFORMATION</p><hr>
    </div>

    <form method="post" enctype="multipart/form-data">
        <?php $sql=mysqli_query($conn,"SELECT * from pots_products where pots_id = '$did' ");
					while($data=mysqli_fetch_array($sql)){ ?>

            <label>NAME</label>
			<input type="text" name="ptname" value="<?php echo $data['pots_name']; ?>">
            
            <label>CATEGORY</label>
			<input type="text" name="ptcategory" value="<?php echo $data['pots_category']; ?>">

            <label>SIZE</label>
			<input type="text" name="ptsize" value="<?php echo $data['pots_size']; ?>">

            <label>PRICE</label>
			<input type="number" name="ptprice" min="1" value="<?php echo $data['pots_price']; ?>">
            
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
            <input type="file" name="new_img" value="" accept="image/*">
            <input type="hidden" name="old_img" value="<?php echo $data['pots_image1']?>" width="100px">&nbsp;&nbsp;&nbsp;
            <input style="width:25%;" type="text" name="ptcolor1" value="<?php echo $data['pots_color1']; ?>">&nbsp;&nbsp;&nbsp;
            <input style="width:25%;" type="number" name="pt1stocks" min="1" value="<?php echo $data['pots_stocks1']; ?>">
            </div>
            <img src="../<?php echo $data['pots_image1'];?>" width="100px;" height="100px;" alt="potsImage"><br>
            
            <!--SECOND VARIATION -->
            <div class="variations">
                <label style="color:#167D39; font-weight:bold;">SECOND-</label>&nbsp;&nbsp;&nbsp;
                <label>IMAGE</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:93px;">COLOR</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:15px;">STOCKS</label>
            </div>

            <div class="variations">
            <input type="file" name="new_img2" value="" accept="image/*">
            <input type="hidden" name="old_img2" value="<?php echo $data['pots_image2']?>" width="100px">&nbsp;&nbsp;&nbsp;
            <input style="width:25%;" type="text" name="ptcolor2" value="<?php echo $data['pots_color2']; ?>">&nbsp;&nbsp;&nbsp;
            <input style="width:25%;" type="number" name="pt2stocks" min="1" value="<?php echo $data['pots_stocks2']; ?>">
            </div>
            <img src="../<?php echo $data['pots_image2'];?>" width="100px;" height="100px;" alt="potsImage"><br>

            <!--SECOND VARIATION -->
            <div class="variations">
                <label style="color:#167D39; font-weight:bold;">THIRD-</label>&nbsp;&nbsp;&nbsp;
                <label>IMAGE</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:115px;">COLOR</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:15px;">STOCKS</label>
            </div>

            <div class="variations">
            <input type="file" name="new_img3" value="" accept="image/*">
            <input type="hidden" name="old_img3" value="<?php echo $data['pots_image3']?>" width="100px">&nbsp;&nbsp;&nbsp;
            <input style="width:25%;" type="text" name="ptcolor3" value="<?php echo $data['pots_color3']; ?>">&nbsp;&nbsp;&nbsp;
            <input  style="width:25%;" type="number" name="pt3stocks" min="1" value="<?php echo $data['pots_stocks3']; ?>">
            </div>
            <img src="../<?php echo $data['pots_image3'];?>" width="100px;" height="100px;" alt="potsImage"><br>
            
            
          
            <br><br><br>
            <a href="pots-prod.php" class="btn btn-danger">CANCEL</a> &nbsp;&nbsp;&nbsp;
            <input type="submit" class="btn btn-success" value="UPDATE" name="ptupdate"/>
            
				<?php } ?>
        </form>

<?php include '../include/footer.html' ; ?> 
  </body>
</html>

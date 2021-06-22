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
		if(isset($_POST['supdate'])){

			$name	    = $_POST['sname'];
            $desc	    = $_POST['sdesc'];
            $link	    = $_POST['slink'];
            $price	    = $_POST['sprice'];
            $spprice	= $_POST['spprice'];
            $spstocks	= $_POST['spstocks'];
            $ssprice	= $_POST['ssprice'];
            $ssstocks	= $_POST['ssstocks'];

            $oldimg = $_POST['old_img'];
            $img = $_FILES['new_img']['name'];

            //check if there is a pic or not//
            if($img != ''){
                $update_img = "img/soil/".$_FILES['new_img']['name'];
            }
            else{
                $update_img =  $oldimg;
            }

            $query = "UPDATE soil_products SET soil_image = '$update_img', soil_name = '$name',
                soil_description = '$desc',  soil_link = '$link', soil_price = '$price',
                soil_var_plastic_price =' $spprice', soil_var_plastic_stocks =' $spstocks',
                soil_var_sack_price =' $ssprice', soil_var_sack_stocks =' $ssstocks'
                WHERE soil_id = '$did'"; 
            $query_run = mysqli_query($conn,$query);

            if($query_run){
                    move_uploaded_file($_FILES['new_img']['tmp_name'],$update_img);
                    
                    $_SESSION['status'] = "Update succesful";
                    $_SESSION['status_code'] = "error";
                    header('Location: soil-prod.php');
                }
                else{
                    $_SESSION['status'] = "Update Error";
                    $_SESSION['status_code'] = "error";
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
        </div>

    <div class="info">
            <p>EDIT SOIL INFORMATION</p><hr>
        </div>

        <form method="post" enctype='multipart/form-data'>
        <?php $sql=mysqli_query($conn,"SELECT * from soil_products where soil_id = '$did' ");
					while($data=mysqli_fetch_array($sql)){ ?>

            <label>IMAGE</label>
            <input type="file" name="new_img" value="" accept="image/*">
            <input type="hidden" name="old_img" value="<?php echo $data['soil_image']?>" width="100px">
            <img src="../<?php echo $data['soil_image'];?>" width="100px;" height="100px;" alt="soilImage">
            
            <label>NAME</label>
			<input type="text" name="sname" value="<?php echo $data['soil_name']; ?>">

            <label>DESCRIPTION</label>
            <textarea  name="sdesc"><?php echo $data['soil_description']; ?></textarea>

            <label>LINK</label>
			<input type="text" name="slink" value="<?php echo $data['soil_link']; ?>">

            <label>PRICE RANGE</label>
			<input type="text" name="sprice" value="<?php echo $data['soil_price']; ?>">
            <br>

            <label style="color:#167D39; font-weight:bold; font-size:20px;">VARIATIONS: PLASTIC</label>
            <div class="variations">
                <label>PRICE</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:80px;">STOCKS</label>
            </div>
            <div class="variations">
                <input type="number" name="spprice" min="1" value="<?php echo $data['soil_var_plastic_price']; ?>">&nbsp;&nbsp;&nbsp;
                <input type="number" name="spstocks" min="1" value="<?php echo $data['soil_var_plastic_stocks']; ?>">
            </div><br>

            <label style="color:#167D39; font-weight:bold; font-size:20px;">VARIATIONS: SACK</label>
            <div class="variations">
                <label>PRICE</label>&nbsp;&nbsp;&nbsp;
                <label style="margin-left:80px;">STOCKS</label>
            </div>
            <div class="variations">
                <input type="number" name="ssprice" min="1" value="<?php echo $data['soil_var_sack_price']; ?>">&nbsp;&nbsp;&nbsp;
                <input type="number" name="ssstocks" min="1" value="<?php echo $data['soil_var_sack_stocks']; ?>">
            </div><br>
            

            <br><br>
            <a href="soil-prod.php" class="btn btn-danger">CANCEL</a> &nbsp;&nbsp;&nbsp;
            <input type="submit" class="btn btn-success" value="UPDATE" name="supdate"/>
            
				<?php } ?>
        </form>

<?php include '../include/footer.html' ; ?> 
 
  </body>
</html>

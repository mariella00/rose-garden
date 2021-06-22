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
		if(isset($_POST['pupdate'])){

			$name	= $_POST['pname'];
            $sname	= $_POST['psciname'];
            $desc	= $_POST['pdesc'];
            $link	= $_POST['plink'];
            $price	= $_POST['pprice'];
            $stocks	= $_POST['pstocks'];

            $oldimg = $_POST['old_img'];
            $img = $_FILES['new_img']['name'];

            //check if there is a pic or not//
            if($img != ''){
                $update_img = "img/plants/".$_FILES['new_img']['name'];
            }
            else{
                $update_img =  $oldimg;
            }

            $query = "UPDATE plant_products SET plant_image = '$update_img', plant_name = '$name',
                plant_sciname = '$sname',  plant_description = '$desc',  plant_link = '$link', plant_price = '$price',
                plant_stocks = '$stocks' WHERE plant_id = '$did'"; 
            $query_run = mysqli_query($conn,$query);

            if($query_run){
                    move_uploaded_file($_FILES['new_img']['tmp_name'],$update_img);
                    
                    $_SESSION['status'] = "Update succesful";
                    $_SESSION['status_code'] = "success";
                    header('Location: plants-prod.php');
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

      <a href="plants-prod.php">
      <span>Plants product</span></a>>
    </div>

    <div class="info">
            <p>EDIT PLANT INFORMATION</p><hr>
    </div>

        <form method="post" enctype="multipart/form-data">
        <?php $sql=mysqli_query($conn,"SELECT * from plant_products where plant_id = '$did' ");
					while($data=mysqli_fetch_array($sql)){ ?>

            <label>IMAGE</label>
            <input type="file" name="new_img" value="" accept="image/*">
            <input type="hidden" name="old_img" value="<?php echo $data['plant_image']?>" width="100px">
            <img src="../<?php echo $data['plant_image'];?>" width="100px;" height="100px;" alt="plantImage">
           
            
            <label>NAME</label>
			<input type="text" name="pname" value="<?php echo $data['plant_name']; ?>">

            <label>SCIENTIFIC NAME</label>
			<input type="text" name="psciname" value="<?php echo $data['plant_sciname']; ?>">

            <label>DESCRIPTION</label>
            <textarea  name="pdesc"><?php echo $data['plant_description']; ?></textarea>

            <label>LINK</label>
			<input type="text" name="plink" value="<?php echo $data['plant_link']; ?>">

            <label>PRICE</label>
			<input type="number" name="pprice" min="1" value="<?php echo $data['plant_price']; ?>">

            <label>STOCKS</label>
			<input type="number" name="pstocks" min="1" value="<?php echo $data['plant_stocks']; ?>">
            <br><br>
            <a href="plants-prod.php" class="btn btn-danger">CANCEL</a> &nbsp;&nbsp;&nbsp;
            <input type="submit" class="btn btn-success" value="UPDATE" name="pupdate"/>
            
				<?php } ?>
        </form>

<?php include '../include/footer.html' ; ?> 
 
  </body>
</html>

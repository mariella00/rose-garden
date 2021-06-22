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

        <a href="manage-orders.php">
        <span>Manage Orders</span></a>>
    </div>

    <div class="info">
            <p>ORDER ITEMS INFORMATION</p><hr>
    </div>

    <div class="content">
    <table class="table table-striped" >	
		<thead>
			<tr class="table-primary">
                <th>Image</th>
                <th>Name</th>
                <th>Product Category</th>
                <th>Size</th>
                <th>Color</th>
                <th>Order quantity</th>
                <th>Price</th>
			</tr>
		</thead>

        <tbody>
        <?php
        $did = intval($_GET['id']);   
        $sql=mysqli_query($conn,"SELECT * from order_items where orderID = '$did' ");
        while($data=mysqli_fetch_array($sql)){ ?>
            <tr>
                <td><img src="../<?php echo $data['oi_image'];?>" width="100px;" height="100px;" alt="plantImage"></td>
                <td><?php echo $data['oi_name'];?></td>
                <td><?php echo $data['oi_prdctClass'];?></td>
                <td><?php echo $data['oi_size'];?></td>
                <td><?php echo $data['oi_color'];?></td>
                <td><?php echo $data['oi_orderQuantity'];?></td>
                <td><?php echo $data['oi_origPrice'];?></td>
            </tr>	
		<?php } ?>
		</tbody>        
	</table>
    </div>

<?php include '../include/footer.html' ; ?> 
 
  </body>
</html>

<?php
session_start();
include_once '../include/config.php';


if(isset($_POST['plntAdd'])){

 $proid			=	$_POST['plntID'];
 $product_qnt	=	$_POST['quantity'];
 $userid		=	$_SESSION['id'];


$result = mysqli_query($conn , "SELECT * FROM plant_products WHERE plant_id ='$proid'");
$row = mysqli_fetch_assoc($result);


				 $plntClass = $row['product_category'];
				 $plntImg = $row['plant_image'];
				 $plntSize= "N/A";
				 $plntColor= "N/A";
				 $plntName =$row['plant_name'];
 				 $origPrice = $row['plant_price'];
				 $totalprice = $row['plant_price'] * $product_qnt;


		$name_sql = "SELECT * FROM cart WHERE c_name = '$plntName' AND user_id = '$userid'";
		$check_item = mysqli_query($conn,$name_sql);

			if (mysqli_num_rows($check_item) > 0){
				$_SESSION['status'] = "Item already exists in your cart";
				$_SESSION['status_code'] = "error";
				header('Location:../users/us-plants.php');
			}
			
			else {
			$reg_sql = "INSERT INTO `cart`(`user_id`, `c_prdctClass`, `c_name`, `c_image`, `c_size`, `c_color`, `c_orderQuantity`, `c_origPrice`, `c_totalPrice`) 
			VALUES ('".$userid."','".$plntClass."','".$plntName."','".$plntImg."','".$plntSize."','".$plntColor."','".$product_qnt."','".$origPrice."','".$totalprice."')";
		
				$check_reg = mysqli_query($conn,$reg_sql);
				if($check_reg){
					$_SESSION['status'] = "Item added to your cart";
					$_SESSION['status_code'] = "success";
					header('Location:../users/us-plants.php');
					}
			
				}
			}
?>
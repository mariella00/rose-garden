<?php
session_start();
include_once '../include/config.php';


if(isset($_POST['soilAdd'])){

 $slID=$_POST['soilID'];
 $slQty=$_POST['quantity'];
 $slVar=$_POST['variation'];
 $userid = $_SESSION['id'];


$result = mysqli_query($conn , "SELECT * FROM `soil_products` WHERE `soil_id`='$slID'");
$row = mysqli_fetch_assoc($result);


				 $slClass = "Soil";
				 $slImg = $row['soil_image'];
				 $slColor= "N/A";
				 $slName =$row['soil_name'];
				 	if ($slVar == "Sack"){
				 		$origPrice = $row['soil_var_sack_price'];
				 	}
				 	if ($slVar == "Plastic"){
				 		$origPrice = $row['soil_var_plastic_price'];
				 	}
 				 
				 $totalprice = $origPrice * $slQty;


		$name_sql = "SELECT * FROM cart WHERE c_size = '$slVar' AND  user_id = '$userid'";
		$check_item = mysqli_query($conn,$name_sql);

			if (mysqli_num_rows($check_item) > 0){
				$_SESSION['status'] = "Item already exists in your cart";
				$_SESSION['status_code'] = "error";
				header('Location:../users/us-soil.php');
			}
			
			else {
			 
			$reg_sql = "INSERT INTO `cart`(`user_id`, `c_prdctClass`, `c_name`, `c_image`, `c_size`, `c_color`, `c_orderQuantity`, `c_origPrice`, `c_totalPrice`) 
			VALUES ('".$userid."','".$slClass."','".$slName."','".$slImg."','".$slVar."','".$slColor."','".$slQty."','".$origPrice."','".$totalprice."')";
		
				$check_reg = mysqli_query($conn,$reg_sql);
				if($check_reg){
					$_SESSION['status'] = "Item added to your cart";
					$_SESSION['status_code'] = "success";
					header('Location:../users/us-soil.php');
					}
			
				}
			}
?>
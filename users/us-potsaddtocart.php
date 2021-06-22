<?php
session_start();
include '../include/config.php';

if(isset($_POST['ptsAdd'])){

 $proid=$_POST['potID'];
 $product_qnt=$_POST['quantity'];
 $userid = $_SESSION['id'];
 $var = $_POST['variation'];

 $image1 = $_POST['varImage1'];
 $image2 = $_POST['varImage2'];
 $image3 = $_POST['varImage3'];




$result = mysqli_query($conn , "SELECT * FROM `pots_products` WHERE `pots_id`='$proid'");
$row = mysqli_fetch_assoc($result);

				 $ptsClass = $row['pots_category'];
				 $ptsName = $row['pots_name'];
				 $ptsSize = $row['pots_size'];
				 $ptsColor = $var;
				 $ptsPrice = $row['pots_price'];
				 $totalprice = $row['pots_price'] * $product_qnt;
				
				 $ptsColor1 = $row['pots_color1'];
				 $ptsColor2 = $row['pots_color2'];
				 $ptsColor3 = $row['pots_color3'];

				 if ($var == $ptsColor1){
				 	$varImage =  $image1;
				 }
				 if ($var == $ptsColor2){
				 	$varImage =  $image2;
				 }
				 if ($var == $ptsColor3){
				 	$varImage =  $image3;
				 }


		$name_sql = "SELECT * FROM cart WHERE c_color = '$var' AND  user_id = '$userid'";
		$check_item = mysqli_query($conn,$name_sql);

			if (mysqli_num_rows($check_item) > 0){
				$_SESSION['status'] = "Item already exists in your cart";
				$_SESSION['status_code'] = "error";
				header('Location:../users/us-pots.php');
			}
			else {
			$reg_sql = "INSERT INTO `cart`(`user_id`, `c_prdctClass`, `c_name`, `c_image`, `c_size`, `c_color`, `c_orderQuantity`, `c_origPrice`, `c_totalPrice`) 
				VALUES ('".$userid."','".$ptsClass."','".$ptsName."','".$varImage."','".$ptsSize."','".$ptsColor."','".$product_qnt."','".$ptsPrice."','".$totalprice."')";
			$check_reg = mysqli_query($conn, $reg_sql);

				if($check_reg){
					$_SESSION['status'] = "Item added to your cart";
					$_SESSION['status_code'] = "success";
					header('Location:../users/us-pots.php');
					}
				}
			}
?>

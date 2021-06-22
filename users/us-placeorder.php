<?php
session_start();
include_once '../include/config.php';

if(isset($_POST['plcordr'])){

	$csmtmrFN = $_POST['frstName'];
	$csmtmrLN = $_POST['lstName'];
	$cstmrCN = $_POST['cntctNmbr'];
	$ordrTtl = $_POST['totals'];
	$dlvryDate = $_POST['setdate'];
	$dlvryLocHN = $_POST['housenumber'];
	$dlvryLocStrt = $_POST['street'];
	$dlvryLocBrgy = $_POST['barangay'];
	$dlvryLocMncplty = $_POST['municipality'];
	$dlvryLocPrvnc = $_POST['province'];
	$pymnt = $_POST['instore'];
	$userid = $_SESSION['id'];
	$cstmrEA = $_POST['emailAdd'];
	$status="placed";

	if(empty($pymnt)){
		$pymntMthd = "Paypal";
		$ordrTotal = $ordrTtl + 100;
	}
	if (isset($pymnt)){
		$pymntMthd = "Cash on instore pickup";
		$ordrTotal = $ordrTtl;

	}
	
    $order_sql = "INSERT INTO `orders`(`user_id`, `o_fName`, `o_lName`, `o_cNum`, `o_email`, `o_hNum`,
	`o_street`, `o_brgy`, `o_municipality`, `o_province`, `o_total`, `o_paymentMethod`,
	`o_deliveryDate`, `o_status`) VALUES ('".$userid."','".$csmtmrFN."','".$csmtmrLN."','".$cstmrCN."',
	'".$cstmrEA."', '".$dlvryLocHN."','".$dlvryLocStrt."','".$dlvryLocBrgy."','".$dlvryLocMncplty."',
	'".$dlvryLocPrvnc."','".$ordrTotal."','".$pymntMthd."','".$dlvryDate."','".$status."')";
	$check_reg = mysqli_query($conn,$order_sql);

		if($check_reg){
		$last_id = mysqli_insert_id($conn);

			$result = mysqli_query($conn , "SELECT * FROM `cart` WHERE `user_id`='$userid'");
			while ($row = mysqli_fetch_array($result)) {
		
			$c1class = $row['c_prdctClass'];
			$c1name = $row['c_name'];
			$c1image = $row['c_image'];
			$c1size = $row['c_size'];
			$c1color = $row['c_color'];
			$c1quantity = $row['c_orderQuantity'];
			$c1priceEach = $row['c_origPrice'];
			$userid = $_SESSION['id'];
			$status="placed";

			$sql1 = "INSERT INTO `order_items`(`orderID`, `user_id`, `oi_prdctClass`, `oi_name`, `oi_image`, `oi_size`, `oi_color`, `oi_orderQuantity`, `oi_origPrice`, `oi_status`)
			VALUES ('".$last_id."','".$userid."','".$c1class."','".$c1name."','".$c1image."','".$c1size."','".$c1color."','".$c1quantity."','".$c1priceEach."', '".$status."')";

				$check_reg = mysqli_query($conn,$sql1);
				if($check_reg){
					//UPDATE
					$delete_sql = "DELETE FROM cart WHERE user_id = '".$userid."'";
					$check_u = mysqli_query($conn,$delete_sql);
					if($check_u){
					//DELETE			
					$update_sql = "UPDATE users SET uAddress_housenumber='".$dlvryLocHN."', uAddress_street='".$dlvryLocStrt."', uAddress_brgy='".$dlvryLocBrgy."',
					uAddress_municipality='".$dlvryLocMncplty."',uAddress_province='".$dlvryLocPrvnc."' WHERE uID ='".$userid."' "; 
					$check_d = mysqli_query($conn,$update_sql);
					if($check_d){
						$_SESSION['status'] = "Order placed succesfully";
						$_SESSION['status_code'] = "success";
						header('Location: orders.php');						
					}
					}
				}
			}
		}
				
}
?>


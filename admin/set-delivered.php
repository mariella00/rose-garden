<?php
session_start();
include_once '../include/config.php';

$oid = intval($_GET['id']);   
$sql = "SELECT * from orders where order_id = '$oid'";
$check = mysqli_query($conn,$sql);

if ($check){
    $update ="UPDATE orders SET o_status ='delivering' WHERE order_id = '$oid'";
    $check1 = mysqli_query($conn,$update);

    if($check1){
        $sql2 = "SELECT * from order_items where orderID = '$oid'";
        $check2 = mysqli_query($conn,$sql2);
        
        if($check2){
            $update2 ="UPDATE order_items SET oi_status ='delivering' WHERE orderID = '$oid'";
            $check3 = mysqli_query($conn,$update2);

            if($check3){
                $_SESSION['status'] = "Order is being delivered";
                $_SESSION['status_code'] = "success";
                header('Location: manage-orders.php');
            }
        }
    }
}
?>


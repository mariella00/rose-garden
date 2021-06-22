<?php
session_start();
include '../include/config.php';
if(isset($_SESSION['role'])){
    if($_SESSION['role'] != "user"){
    header('Location:../users/home.php');
    }
}
else{
    header('Location:../index.php');
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
     <link rel="stylesheet" type="text/css" href="../css/users.css">
  <!--js-link--------------------->
  <script src="../js/Jquery.js"></script>
  </head>

<body>
  <?php include('../include/nav.php');?>
<br>
<label style="width: 100%; text-align:center; font-size:40px; font-family: 'Lobster', cursive;  letter-spacing: 2px; color: #167D39;">Order Lists</label>
<!-- Table ------------------------------------ -->
<div class="content">
<table class ="cart-table" style="border:5px solid #167D39;">
<thead style="padding:10px; text-align:center;">
    <tr>
        <th>Products</th>
        <th>Total Amount</th>
        <th>Delivery Date</th>
        <th>Payment Method</th>
        <th>Order Status</th>
    </tr>
</thead>
<tbody>
      <?php 
          $ordrget = mysqli_query($conn , "SELECT * FROM orders WHERE user_id ='$userid'"); 
          while ($rows = mysqli_fetch_array($ordrget)) {
      ?>
      <tr>
        <td>
        <a href="item_result.php?id=<?php echo $rows['order_id'];?>" class="btn btn-secondary" style="color:#fff; font-size:15px; padding:3px;">View items</a>
        </td>
         <td>₱ <?php echo $rows['o_total'];?></td>
         <td><?php echo $rows['o_deliveryDate'];?></td>
         <td><?php echo $rows['o_paymentMethod'];?></td>
         
         <td style="text-align:center;">
           <?php 
              if ($rows['o_status'] == 'placed'){ ?>
                <label style="color:#167D39;">Placed</label>  
              <?php }

              if ($rows['o_status'] == 'delivering'){ ?>
                <label style="color:#167D39;">Delivering</label> 
                <a style="font-size:17px;" href="delivered.php?id=<?php echo $rows['order_id'];?>" class="btn btn-link">Order Recieved</a>
              <?php }

              if ($rows['o_status'] == 'received'){ ?>
              <label style="color:#FF0000;">Received</label>  
            <?php } ?>
          </td>
      </tr>
<?php } ?>
</tbody>
</table>

<?php include '../include/footer.html'; ?>
</body>
</html>
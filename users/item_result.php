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
  <?php include('../include/nav.php');?><br>

<label style="width: 100%; text-align:center; font-size:40px; font-family: 'Lobster', cursive;  letter-spacing: 2px; color: #167D39;">Item Lists</label>

 <?php
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $get_items = mysqli_query($conn , "SELECT * FROM order_items WHERE orderID = '$id'");
}?>
              <table class="t-table" style="border:5px solid #167D39;">
                <thead>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </thead>
                <?php while ($row = mysqli_fetch_array($get_items)) {  ?>

                <tr class="t-row">
                  <td class="t-row" >
                    <img width="100px" length="auto" src="../<?php echo $row['oi_image']; ?>">
                  </td>
                  <td class="t-row">
                    <?php echo $row['oi_name']; ?><br>
                      Size: &nbsp;
                      <?php echo $row['oi_size']; ?><br>
                      Color: &nbsp;
                      <?php echo $row['oi_color']; ?>
                  </td>
                  <td class="t-row">
                    Price:
                    ₱<?php echo $row['oi_origPrice']; ?> x  <?php echo $row['oi_orderQuantity']; ?>
                  </td>
                  <td class="t-row">
                    ₱<?php echo $row['oi_origPrice']; ?><br>
                  </td>
                </tr>

                <?php } ?>
                </table>
            <br><br>
            <a style="margin-left:75%;" href="orders.php" class="btn btn-danger">BACK</a>        
    </div>
  </div>
</div>
<?php include '../include/footer.html'; ?>
</body>
</html>
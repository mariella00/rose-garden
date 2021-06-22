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

<?php if (isset($_GET['error'])) { ?>
    <p class="error" id="error"><?php echo $_GET['error']; ?></p>
<?php } ?>

<!-- Table ------------------------------------ -->
<div class="content">
<table class ="cart-table">
<thead>
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Variation</th>
        <th>Subtotal</th>
    </tr>
</thead>
<tbody>

<?php 
$userid = $_SESSION['id'];
$results = mysqli_query($conn , "SELECT * FROM `cart` WHERE user_id ='$userid'"); 
while ($row = mysqli_fetch_array($results)) { ?>

    <tr>
        <td>
            <div class="cart-info">
            <img src="../<?php echo $row['c_image'];?>" width="150px;" alt="productImage">
                <div>
                    <p><?php echo $row['c_name'];?><p>
                    <p>₱<?php echo $row['c_origPrice'];?> each<p>
                    
                    <!-- REMOVE BUTTON -->
                    <?php
                    if (isset($_POST['remove'])){
                        $crtID=$_POST['rid'];
                        $rslt = "DELETE FROM `cart` WHERE cart_id='".$crtID."'";
                        $check_reg = mysqli_query($conn, $rslt);
        
                        if($check_reg){
                            echo("<script>location.href='cart.php?error=Item removed';</script>");
                        }    
                    }                           
                    ?>

                    <form method="post">
                    <input type="hidden" name="rid" value="<?php echo $row['cart_id'];?>">
                    
                    <button type="submit" class="btn btn-danger" name="remove"
                    style="width:80px; padding:0;">remove</button> 
                    <input type="hidden" name="category" value="<?php echo $row['c_prdctClass'];?>">
                    </form>

                </div>
            </div>
        </td>
        <td>
         <!-- EDIT BUTTON -->
        <?php
            if (isset($_POST['edit'])){
                $cartID=$_POST['id'];
                $qnty= $_POST['quantity'];
                $prc=$_POST['price'];
                $newTotal= $qnty*$prc;

                $rslt = "UPDATE `cart` SET `c_orderQuantity`='".$qnty."' , `c_totalPrice`='".$newTotal."' WHERE cart_id='".$cartID."'";
                $check_reg = mysqli_query($conn, $rslt);

                    if($check_reg){
                        echo("<script>location.href='cart.php?error=Item edited';</script>");
                    }    
                }
        ?>
            
            <!-- EDIT QUANTITY -->
            <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['cart_id'];?>">
            <input type="hidden" name="price" value="<?php echo $row['c_origPrice'];?>">
            <input type="number" name="quantity" value="" min="1" max="100"
             placeholder="<?php echo $row['c_orderQuantity'];?>" required ?><br><br>

            <button type="submit" class="btn btn-primary" name="edit"
            style="width:50px; padding:0;">edit</button> 
            </form> 
        </td>
        <td>
            Size: <?php echo $row['c_size'];?><br>
            Color: <?php echo $row['c_color'];?><br>
        </td>
        <td>
            ₱<?php echo $row['c_totalPrice'];?>
        </td>
    </tr>

<?php } ?>







</tbody>
</table>
</div>
  

<?php
                    
                    $userid = $_SESSION['id'];
                    $cartcount= mysqli_query($conn , "SELECT * FROM `cart` WHERE user_id ='$userid'");
                    $num_rows = mysqli_num_rows($cartcount);
                    if ($num_rows == 0){

                      ?>
                      <br>
                      <label style="width: 100%; text-align:center; font-size:20px;">
                      <?php echo "Your cart is empty.";?></label> <?php }

                      else{
                    ?>


    <div class="total-price">
        <table>
            <tr>
                <td>Total</td>
                <td>₱ <?php
                  $totalReq= mysqli_query($conn , "SELECT SUM(c_totalPrice) AS totalsum FROM cart WHERE user_id ='$userid'");
                  $row = mysqli_fetch_assoc($totalReq); 
                  $cartTotal = $row['totalsum'];
                  echo $cartTotal;
                  ?></td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>₱ 100.00</td>
            </tr>
        </table>
    </div>

    <div class="addcart">
        <button type="button" class="btn btn-success"  style="width: 130px;"
        data-toggle="modal" data-target=".bd-example-modal-lg"    >
        
        <span class="btn-lbl">CHECK OUT</span><i class="fas fa-cart-plus"
        style="color:white; font-size:15px;"></i></button>
    </div>
    <?php

} ?>
    <?php include '../include/footer.html'; ?>
    
 <!-- PAYPAL  ---------------------------------->
<script src="https://www.paypal.com/sdk/js?client-id=Af7zzhTTDI_gH_z_eDk1AcyYKPTJ8xPn9rq-myJCQq7WToD5f6SAKUtycyE1PQESpMJy7QS2SK_STqJi&disable-funding=credit,card"></script>
    <script type="text/javascript">
                  var cartu = <?php echo $cartTotal + 100?>;
                     paypal.Buttons({

                    style:{
                      color: 'blue'
                    },
                    createOrder: function(data, actions){
                      return actions.order.create({
                        purchase_units:[{
                          amount: {
                            value: cartu
                          }
                        }]
                      });
                    },
                    onApprove: function(data, actions){
                      return actions.order.capture().then(function(details){
                        console.log(details)
                        alert('Paypal transaction succesful');  window.location = window.location.href + "#ewan"
                        
                      })
                    },
                    onCancel:function(data){
                      alert('Paypal transaction cancelled');  window.location = window.location.href + "#ewan"
                    
                    }

                   }).render('#pay-method');
                  </script>

<!-- Checkout -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ewan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
      <div style=" width: 100%; position: relative;align-items: center; text-align: center;">
          <img sty width="150" length="auto" src="../img/logo.png">
      </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

          <?php 
                  $userid = $_SESSION['id'];
                  $totalReq= mysqli_query($conn , "SELECT * FROM cart WHERE user_id ='$userid'");?>

              <table class="t-table">
                <thead>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </thead>
               <?php   while ($row = mysqli_fetch_array($totalReq)) {  ?>

                <tr class="t-row">
                   <td class="t-row" >
                     <img width="50" length="auto" src="../<?php echo $row['c_image']; ?>">
                   </td>
                   <td class="t-row">
                     <?php echo $row['c_name']; ?><br>
                      Size: &nbsp;
                      <?php echo $row['c_size']; ?><br>
                      Color: &nbsp;
                       <?php echo $row['c_color']; ?>
                   </td>
                   <td class="t-row">
                    Price:
                    ₱<?php echo $row['c_origPrice']; ?> x  <?php echo $row['c_orderQuantity']; ?>
                   </td>
                   <td class="t-row">
                    ₱<?php echo $row['c_totalPrice']; ?><br>
                   </td>
                </tr>

                <?php } ?>
              </table>

<form action="us-placeorder.php" method="post">
            
            <div class="user-info">
               <?php 
                  $userid = $_SESSION['id'];
                  $res= mysqli_query($conn , "SELECT * FROM users WHERE uID ='$userid'");?>
                      <?php   while ($row = mysqli_fetch_array($res)) {  ?>
                        <div class="personal-info">
                        <div>

                           <?php echo $row['uFirst_name']; ?> 
                           <input type="hidden" name="frstName" value="<?php echo $row['uFirst_name']; ?>">

                            <?php echo $row['uLast_name']; ?>
                            <input type="hidden" name="lstName" value="<?php echo $row['uLast_name']; ?>">
                        </div>
                        <div>
                             <?php echo $row['uNumber']; ?>
                             <input type="hidden" name="cntctNmbr" value="<?php echo $row['uNumber']; ?>">

                             <?php echo $row['uEmail']; ?>
                             <input type="hidden" name="emailAdd" value="<?php echo $row['uEmail']; ?>">
                        </div>
                         <?php } ?>
                        </div>

                        <div class="total-txt">
                          <span>Order total:</span>
                        </div>
                        <div class="order-total">
                           <h5>
                          <?php
                          $userid = $_SESSION['id'];
                          $totalReq= mysqli_query($conn , "SELECT SUM(c_totalPrice) AS totalsum FROM cart WHERE user_id ='$userid'");
                          $row = mysqli_fetch_assoc($totalReq); 
                          $cartTotal = $row['totalsum'];
                           echo "₱ ".$cartTotal." ";
                            ?></h5>     
                            <input type="hidden" name="totals" value="<?php echo $cartTotal;?>">
                        </div>
                      </div>

                        <div class="set-date">
                         <div class="input-date">
                          <label>&nbsp; Set pick-up/Delivery date:&nbsp;&nbsp;</label>
                            <input type="date" name="setdate" required>
                            </div>
                            </div>

                        <div class="input-address">
                            <?php
                               $loc= mysqli_query($conn , "SELECT * FROM users WHERE uID ='$userid'");
                               while ($row = mysqli_fetch_array($loc)) {  ?>
                            <label>Set delivery location:</label><br>
                            <input type="text" name="housenumber" placeholder="house number" value="<?php echo $row['uAddress_housenumber'];?>" required>
                            <input type="text" name="street" placeholder="street" value="<?php echo $row['uAddress_street'];?>" required>
                            <input type="text" name="barangay" placeholder="barangay" value="<?php echo $row['uAddress_brgy'];?>" required>
                            <select name="municipality" id="municipality" required>
                                <option value="<?php echo $row['uAddress_municipality'];?>"><?php echo $row['uAddress_municipality'];?></option>
                                <option value="Baliuag">Baliuag</option>
                                <option value="Balagtas">Balagtas</option>
                                <option value="Bulakan">Bulakan</option>
                                <option value="Bocaue">Bocaue</option>
                                <option value="Calumpit">Calumpit</option>
                                <option value="Guiguinto">Guiguinto</option>
                                <option value="Hagonoy">Hagonoy</option>
                                <option value="Malolos">Malolos</option>
                                <option value="Meycauayan">Meycauayan</option>
                                <option value="Marilao">Marilao</option>
                                <option value="Pandi">Pandi</option>
                                <option value="Plaridel">Plaridel</option>
                                <option value="Pulilan">Pulilan</option>
                                <option value="Santa Maria">Santa Maria</option>
                              </select>

                            <input type="text" name="province" value="Bulacan" readonly>
                            <?php } ?>
                            </div>

                        <div class="txt-pay">
                          <span style="font-size: 15px;">Pay us through:</span>
                        </div>

                        <div class="payment">
                          <div class="cop">
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                               <div class="btn-group" role="group" aria-label="Third group">
                                <label class="btn btn-warning btn-lg">
                                  <input type="radio"  class="sr-only" class="btn btn-warning btn-lg" name="instore"
                                  <?php if (isset($instore) && $instore=="in-store pickup") echo "checked";?> 
                                  value="in-store pickup">&nbsp;&nbsp;&nbsp;<span >Cash on instore pick-up</span>&nbsp;&nbsp;
                                  <i class="fas fa-store"></i></label>
                                </div>
                                </div>

                          <!--<button type="button" class="btn btn-warning btn-lg">&nbsp;&nbsp;<span >Cash on instore pick-up</span>&nbsp;&nbsp;<i class="fas fa-store"></i></button> -->
                          </div>
                          
                        <div id="pay-method"></div>         
          </div>
          
      <div style="width: 80%; margin: 10px auto 20px auto;">
        <button type="submit" name="plcordr" class="btn btn-success btn-lg btn-block">Place Order</button>
      </div>
  </form>
</div>


  </body>
</html>
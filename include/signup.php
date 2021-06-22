<?php
	session_start();
	include 'config.php';
  include 'scripts.php';

	if(isset($_POST['signup'])){
		$firstname 	= 	$_POST['firstname'];
		$lastname 	= 	$_POST['lastname'];
		$email 		  = 	$_POST['email'];
		$cnum 		  = 	$_POST['cellnum'];
		$password 	= 	$_POST['regpass'];
		$cpass 		  = 	$_POST['conpass'];
		$role		    =	  "user";
		
				
		$email_sql = "SELECT * FROM users WHERE uEmail = '$email'";
		$check_email = mysqli_query($conn,$email_sql);

			if (mysqli_num_rows($check_email) > 0){
        header("Location: signup.php?error=Email is already used");
        exit();
			}
			else{
				if($password == $cpass){
				$reg_sql = "INSERT INTO users (uFirst_name, uLast_name, uEmail, uNumber, uPassword, uRole)
				VALUES ('".$firstname."','".$lastname."','".$email."','".$cnum."','".$password."','".$role."')";
				$check_reg = mysqli_query($conn,$reg_sql);
			
				if($check_reg){
          echo "<script>alert('Registration succesful you can now login'); window.location='login.php';</script>";
					}
					else{
          header("Location: signup.php?error=Error saving the data");
					}
				}
					else{
            header("Location: signup.php?error=Password doesn't matched");
            exit();
					}
				
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
     <link rel="stylesheet" type="text/css" href="../css/style.css">
	<!--js-link--------------------->
  <script src="../js/Jquery.js"></script>
  </head>
<body>
<nav> 
    <!--menu-bar----------------------------------------->
    <div class="navigation">
        <!--logo------------>
        <a href="#" class="logo"><img src="../img/logo.png"></a>
        <!--menu-icon------------->
        <div class="toggle"></div>
        <!--menu----------------->
        <ul class="menu">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../plants.php">Plants</a></li>
            <li><a href="../pots.php">Pots</a></li>
            <li><a href="../soil.php">Soil</a></li>
        </ul>
  <!--CART----------------->
    <div class="cart">
      <a href="login.php"><i class="fas fa-shopping-cart"><span class="num-cart-product">0</span></i></a>
    </div>
  <!--SEARCH----------------->
    <div class="search-box">
      <input class="search-txt" type="text" name="" placeholder="Type to search">
      <a class="search-btn" href="#">
      <i class="fas fa-search" ></i></a>
    </div>
  <!--USER----------------->        
    <div class="right">
      <a href="login.php" class="user"><i class="far fa-user"></i></a>
    </div>  
</div>
</nav>

<form action="signup.php" method="post">
		<div class="panel">
		<div class="reg-info-box">
			 <h5>Already have an account?</h5><br><br>
			 <a href="login.php" id="reg">LOGIN</a>
			</div>
		
		<div class="white-panel2">
		<h1>Signup</h1>
		<h5>Fill up the form to create an account.</h5>

		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

			<div class="form-field">
        <input type="text" name="firstname" placeholder="First Name" required/>&nbsp;&nbsp; 
        <input type="text" name="lastname" placeholder="Last Name" required/>
      </div>
			
				<input type="email" placeholder="Email" name="email" required>
				<input type="text" placeholder="Contact Number (09xxxxxxxxx)" name="cellnum" pattern="[0-9]{11}" required>
				<input type="password" placeholder="Password" name="regpass" required>
				<input type="password" placeholder="Confirm Password" name="conpass" required>
				
				<input type="submit" class="btn btn-success" value="SUBMIT" name="signup"/>
		</div>
		
		</div>
	</form>
<br><br><br>

	<?php include 'footer.html'; ?>
  </body>
</html>
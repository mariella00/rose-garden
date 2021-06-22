<?php
session_start();
include 'config.php';
include 'scripts.php';

if (isset($_POST['email']) && isset($_POST['pass'])) {
	  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['pass']);

  if (empty($email)) {
		header("Location: login.php?error=Email is required");
	  exit();
	}else if(empty($pass)){
    header("Location: login.php?error=Password is required");
	  exit();
	}else{
		$sql = "SELECT * FROM users WHERE uEmail='$email' AND uPassword='$pass'";
		$result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        if ($row['uRole'] == "admin"){
          $_SESSION['role'] = $row['uRole'];
          $_SESSION['id'] = $row['uID'];

          $_SESSION['status'] = "Login as admin";
          $_SESSION['status_code'] = "success";
          header('Location:../admin/home.php');
        }
        else{
          $_SESSION['role'] = $row['uRole'];
          $_SESSION['id'] = $row['uID'];
          header('Location:../users/home.php');
        }
      }
    }
    else{
      header("Location: login.php?error=Mismatched details");
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
<!---Login------------------------------------------------------------------------->
<form action="login.php" method="post">	
    <div class="panel">
            <div class="login-info-box">
            <h5>Doesn't have an account?</h5><br>
            <a href="signup.php" id="reg">SIGNUP</a>
            </div>
            
        <div class="white-panel">
                <h1>Login</h1>
                <h5>Fill in your credentials to log in.</h5>

                <?php if (isset($_GET['error'])) { ?>
                  <p class="error" id="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="pass">
                
                <a href="forgot-pass.php" id="fpass">Forgot password?</a>
                <input type="submit" class="btn btn-success" value="SUBMIT" name="login"/>   
        </div>
    </div>  
</form>
<br><br><br>

	<?php include 'footer.html';?> 
  </body>
</html>
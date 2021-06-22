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

      $usID = $_SESSION['id'];
      if(isset($_POST['edit'])){
        $firstname    =   $_POST['firstname'];
        $lastname     =   $_POST['lastname'];
        $email        =   $_POST['email'];
        $number       =   $_POST['number'];
        $housenum	    =   $_POST['housenum'];
        $street	      =   $_POST['street'];
        $baranggay	  =   $_POST['baranggay'];
        $municipality	=   $_POST['municipality'];
        $province	    =   "Bulacan";

      $query = "UPDATE users SET uFirst_name='$firstname', uLast_name='$lastname', uEmail='$email',
      uNumber='$number', uAddress_housenumber='$housenum', uAddress_street='$street',
      uAddress_brgy='$baranggay', uAddress_municipality='$municipality', uAddress_province='$province'
      WHERE uID='$usID'";
      $query_run = mysqli_query($conn, $query);

      if($query_run){
        echo("<script>location.href='edit-profile.php?error=Edit succesful';</script>");
      }
      else{
        echo("<script>location.href='edit-profile.php?error=Edit error';</script>");
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
     <link rel="stylesheet" type="text/css" href="../css/users.css">
  <!--js-link--------------------->
  <script src="../js/Jquery.js"></script>
  </head>

<body>
  <?php include('../include/nav.php');?>

  <?php if (isset($_GET['error'])) { ?>
    <p class="error" id="error"><?php echo $_GET['error']; ?></p>
<?php } ?>

<form method="post" class="profile">

<?php $sql=mysqli_query($conn,"SELECT * from users where uID = '$userid'");
					while($row=mysqli_fetch_array($sql)){ ?>

    <div class="info">
        <p><i class="fas fa-user-edit"></i> Edit Profile</p>
    </div>

    <div class="form-field">
        <label>First Name</label>            
        <label style="margin-left:22%;">Last Name</label>
    </div>
    <div class="form-field">
        <input type="text" name="firstname" value="<?php echo $row['uFirst_name']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="lastname" value="<?php echo $row['uLast_name']; ?>">
    </div>
    <br>

    <div class="form-field">
        <label>Email</label>
        <label style="margin-left:27%;">Cellphone Number</label>
    </div>
    <div class="form-field">
        <input type="email" name="email" value="<?php echo $row['uEmail']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="number" value="<?php echo $row['uNumber']; ?>" pattern="[0-9]{11}">
    </div>
    <br>
    
    <div class="form-field">
    <label style="width: 100%; text-align:center; font-size:25px;">ADDRESS</label>
    </div>

    <div class="form-field">
    <label>House number</label>
    <label style="margin-left:8.3%;">Street</label>
    <label style="margin-left:35%;">Baranggay</label>
    </div>

    <div class="form-field">
    <input style="width:20%;" type="number" name="housenum" min="1" value="<?php echo $row['uAddress_housenumber']; ?>">
    <input style="margin-left:4%; width:40%;" type="text" name="street" value="<?php echo $row['uAddress_street']; ?>">
    <input style="margin-left:4%; width:40%;" type="text" name="baranggay" value="<?php echo $row['uAddress_brgy']; ?>">
    </div>

    <br>
    <div class="form-field">
    <label>Municipality</label>
    <label style="margin-left:32.5%;">Province</label>
    </div>

    <div class="form-field">
    <select style="width:40%;" name="municipality">
				<option value="<?php echo $row['uAddress_municipality']; ?>"><?php echo $row['uAddress_municipality']; ?></option>
				<option value="Balagtas">Balagtas</option>	
				<option value="Baliwag">Baliwag</option>	
				<option value="Bocaue">Bocaue</option>
                <option value="Bulakan">Bulakan</option>
                <option value="Calumpit">Calumpit</option>
                <option value="Guiguinto">Guiguinto</option>
                <option value="Hagonoy">Hagonoy</option>
                <option value="Malolos">Malolos</option>
                <option value="Marilao">Marilao</option>
                <option value="Meycauayan">Meycauayan</option>
                <option value="Pandi">Pandi</option>
                <option value="Plaridel">Plaridel</option>
                <option value="Pulilan">Pulilan</option>
                <option value="Sta Maria">Sta Maria</option>

    <input style="margin-left:4%; width:30%;" type="text" name="province" value="Bulacan" readonly>
    </div>
    <br><br>

    <a href="home.php" class="btn btn-danger">CANCEL</a> &nbsp;&nbsp;&nbsp;
    <input type="submit" class="btn btn-success" value="UPDATE" name="edit"/>

    <?php } ?>
</form>

<?php include '../include/footer.html' ; ?> 
 
  </body>
</html>


<?php
session_start();
include '../include/config.php';
if(isset($_SESSION['role'])){
    if($_SESSION['role'] != "admin"){
        header('Location: ../admin/home.php');
    }
}
else{
    header('Location: ../index.php');
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
     <link rel="stylesheet" type="text/css" href="../css/admin.css"><!-- //main styles-->
  <!-- //dataTable styles-->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/>
	<!--js-link--------------------->
  <script src="../js/Jquery.js"></script>
    <script>
      $(document).ready(function() {
        $('#dataTableID').DataTable();
        });
    </script>
  </head>

    <body>
    <?php include('../include/nav-ad.php'); ?>

    <div class="links">
      <a href="home.php">
        <i class="fas fa-home"></i>
        <span>Home</span></a>>

      <a href="manage-users.php">
      <span>View Users</span></a>>
    </div>


        <div class="info">
            <p>VIEW USERS</p> 
            <hr>
        </div>
    <div class="content">
    <table id="dataTableID" class="table table-striped" >	
				<thead>
				<tr class="table-primary">
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Contact Number</th>
				<th>Email</th>
        <th>Address</th>
       
				</tr>
				</thead>

				<tbody>
				<?php
          $sql = mysqli_query($conn, "SELECT uID, uFirst_name, uLast_name, uNumber, uEmail,
          CONCAT (uAddress_housenumber, ' ', uAddress_street, ' ', uAddress_brgy, ' ', uAddress_municipality, ' ', 
          uAddress_province) AS Address FROM users WHERE uRole = 'user'");
					while($row=mysqli_fetch_array($sql)) {
				?>
				
				<tr>
				<td><?php echo $row['uID'];?></td>
				<td><?php echo $row['uFirst_name'];?></td>
				<td><?php echo $row['uLast_name'];?></td>
				<td><?php echo $row['uNumber'];?></td>
				<td><?php echo $row['uEmail'];?></td>
        <td><?php echo $row['Address'];?></td>
        
        </tr>	
				<?php } ?>
				</tbody>
        
		</table>
    </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<?php include '../include/footer.html' ; ?>
<?php include '../include/delete.php' ; ?>

  </body>
</html>
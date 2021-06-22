<?php

$servername = "localhost"; 
$database 	= "rosegarden"; 
$dbname 	= "root"; 
$dbpass 	= ""; 

$conn = mysqli_connect($servername, $dbname,
$dbpass, $database);

if ($conn === false){
	die ("CONNECTION ERROR".mysqli_connect_error());
}

?>
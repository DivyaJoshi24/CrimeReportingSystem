<?php 

$server= "localhost";
$username= "root";
$password= "";
$dbname= "test";
	
$conn = mysqli_connect($server, $username, $password, $dbname);

	if($conn){
	?>
		<script>
			alert('COMPLAINT RESOLVED- record deleted successfully !!!');
		</script>
	<?php
	}
	else{
		die("No Connection".mysqli_connect_error());
	}
	
	$id= $_GET['id'];
	$deletequery= "DELETE FROM `crime_reports` WHERE `crime_reports`.`Report ID` = $id";
	$query = mysqli_query($conn, $deletequery);
	
	header('location:displayData.php');
	
?>

<?php 

$server= "localhost";
$username= "root";
$password= "";
$dbname= "test";
	
$conn = mysqli_connect($server, $username, $password, $dbname);

	if($conn){
	?>
		<script>
			alert('Connecting to the database !!!');
		</script>
	<?php
	}
	else{
		die("No Connection".mysqli_connect_error());
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Complaints</title>
	<?php include 'link.php'; ?>
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://use.fontawesome.com/602bbd89d0.js"></script>
</head>
<body>
	<nav>
		<ul>
			<li><a href="login.php">Go Back</a></li>
		</ul>
		<div class="logo">
			<p>ADMIN PORTAL- Currently Viewing Complaints</p>
		</div>
	</nav>
	
	<div class="main-div">
		<h1>Registered Complaints</h1>
		<div class="center-div">
			<div class="table-responsive">
				<table>
					<thead>
						<tr>
							<th>Report ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Aadhaar No.</th>
							<th>Crime Location</th>
							<th>Description</th>
							<th>Complaint Filing Date</th>
							<th colspan="2">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
	
							$selectquery = "select * from crime_reports ";
							$query = mysqli_query($conn, $selectquery);
							$num = mysqli_num_rows($query);
	
							while($res = mysqli_fetch_array($query)){
						
						?>
								
								<tr>
									<td class="id"><?php echo $res['Report ID']; ?></td>
									<td><?php echo $res['Name']; ?></td>
									<td><?php echo $res['Email'];?> </td>
									<td><?php echo $res['Aadhaar No.']; ?></td>
									<td><?php echo $res['Crime Location']; ?></td>
									<td><?php echo $res['Description']; ?></td>
									<td><?php echo $res['Complaint Filing Date']; ?></td>
									<td><button class="btn1">Pending </button></td>
									<td><button class="btn2"><a href="delete.php?id=<?php echo $res['Report ID']; ?>" >Resolved <i class="fa fa-trash" aria-hidden="true"></i> </a></button></td>
								</tr>
						<?php
							}
	
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	
	</div>




</body>
</html>
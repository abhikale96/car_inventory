<?php include('includes/config.php'); ?>
<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<title>Mini Car Inventory System</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
 <?php

//if ($result->num_rows > 0) {
    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["Serial_number"]. " - manufacturer_name: " . $row["manufacturer_name"]. " model_name" . $row["model_name"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}

if(isset($_POST['modal_submit']))

{
	
$modal_name = $_POST['modal_name'];	
$sql_select_view_inventory = "SELECT * FROM `$dbname`.`view_inventory` WHERE  manufacturer_id = 1 AND model_name  = '".$modal_name."' ";
echo $sql_select_view_inventory;
$result = $dbconn->query($sql_select_view_inventory);

if ( $result->num_rows > 0) {
	$sql = "UPDATE `$dbname`.`view_inventory` SET count = count + 1 WHERE  manufacturer_id = 1 And model_name  = '".$modal_name."' ";
}	else {
	$sql = "INSERT INTO `$dbname`.`view_inventory` ( manufacturer_id , model_name ,count ) VALUES ( 1 , '".$modal_name."',1)";
	
}
$dbconn->query($sql); 

// Validate the user email
if(! $nameFiled = filter_var(trim($_POST['modal_name']), FILTER_SANITIZE_STRING))
{     
    echo 'Please insert a valid name.';
    die();
}
}
?>
	<div>
	  <a href="<?php echo SITEURL ?>/index.php">Add Manufacturer</a> / <a href="<?php echo SITEURL ?>/index.php"href="<?php echo SITEURL ?>/viewinventory.php"> View Inventory </a>
	</div>
	
	<div>
		<h1 class="text-center"> Add Model</h1>
        <br><br><br>
        
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="row">
				
				<div class="col-sm-6 col-md-6 text-center">
					<strong>Model Name:  </strong>  <input type="text" name="modal_name">
				</div>	
				<div class="col-sm-6 col-md-6 text-center">
					<strong>Manufaturer Name : </strong>
					<select >
						<option > Select manufacturer name </option>
						<?php 
							$sql = "SELECT * FROM manufacturer";
							$result = $dbconn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<option value='". $row["id"] . "' >" .$row["manufacturer_name"]. "</option>";
							   }
							}
						?>	
					</select> 	
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-md-12 text-center">
					<input type="submit" name="modal_submit" value="submit">
				</div>
			</div>
		</form>
		
		 
		 
			
	</div>
 
</body>
</html>
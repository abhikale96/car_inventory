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

if(isset($_POST['submit']))

{
	
$name = $_POST['name'];	
echo "User Has submitted the form and entered this name : <b> $name </b>";
$sql = "INSERT INTO `$dbname`.`manufacturer` ( manufaturer_name) VALUES ('".$name."')";

// Validate the user email
if(! $nameFiled = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING))
{     
    echo 'Please insert a valid name.';
    die();
}



if ($dbconn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $dbconn->error;
}



}
?>
	<div>
	  <a href="<?php echo SITEURL ?>/model.php">Add Car Model</a> / <a href="<?php echo SITEURL ?>/viewinventory.php"> View Inventory </a>
	</div>
	<div style="padding: 10px;">
		<h1 class="text-center"> Add Manufacture</h1>
		<br>
		<br>
		<br>
		<br>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="row">
				
				<div class="col-sm-12 col-md-12 text-center">
					<strong>Manufaturer Name : </strong> <input type="text" name="name">  
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-md-12 text-center">
					<input type="submit" name="submit" value="Submit">
				</div>
			</div>
		</form>

	</div> 
</body>

</html>


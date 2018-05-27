<?php include('includes/config.php'); ?>
<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<title>View Inventory</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
 <?php
	$sql = "SELECT * FROM `$dbname`.`view_inventory`  inv , `$dbname`.`manufacturer` man where inv.manufacturer_id = man.id";
	$result = $dbconn->query($sql);
	

//if ($result->num_rows > 0) {
    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["Serial_number"]. " - manufacturer_name: " . $row["manufacturer_name"]. " model_name" . $row["model_name"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}

?>
	<div>
	  <a href="<?php echo SITEURL ?>/index.php">Add Manufacturer</a> / <a href="<?php echo SITEURL ?>/model.php" > Add Model </a>
	</div>
	
	<div>
		<h1 class="text-center"> Car Inventory System</h1>
        <br><br><br>
    	<?php
			if ($result->num_rows > 0) {
				// output data of each row
			    while($row = $result->fetch_assoc()) {
		        echo $row["Serial_number"]. "\t". $row["manufacturer_name"]. "\t" . $row["model_name"]."\t" . $row["count"] . "<br>";
		    }
			} else {
			    echo "0 results";
		    }
		?>	
			
	</div>
 
</body>
</html>
<?php
	#define('SITEURL', 'http://www.inventory.org');
	define('SITEURL', 'http://localhost/inventory');
	global $servername;
	global $username;
	global $password;
	global $dbname;
	global $dbconn;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "carinventory";

	// Create connection
	$dbconn = new mysqli($servername, $username, $password,$dbname);
	// Check connection
	if ($dbconn->connect_error) {
		die("Connection failed: " . $dbconn->connect_error);
	} 
	//echo "Connected successfully";
?>

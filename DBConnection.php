<?php 

// creating connection with db
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "traindb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	// else{
	// 	echo "<script>alert('Conection Successfull');</script>";
	// }

 ?>
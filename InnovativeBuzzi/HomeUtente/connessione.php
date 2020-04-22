<?php

	$servername = "localhost";
	$usernameDb = "root";
	$passwordDb = "";
	$dbNome="innovativeBuzzi";   //nome db
	// Create connection
	$conn = new mysqli($servername, $usernameDb, $passwordDb,$dbNome);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}



?>

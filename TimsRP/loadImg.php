<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "timsrp";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	// Check connection
	if ($conn->connect_error) {
		echo "connerr";
		die("Connection failed: " . $conn->connect_error);
	} 	
	
	if ($stmt = $conn->prepare("SELECT `picture` FROM `users` WHERE userid=?")) {
		
		$stmt->bind_param("s", $_COOKIE["loggedInUID"]);
		
		$stmt->execute();
		$stmt->bind_result($pic);
		$stmt->fetch();
		/*
		$rc = $stmt->execute();
		if ( false===$rc ) {
			printf("Errormessage: %s\n", $conn->error);
			echo "failed excecute";
		}
		*/
		$stmt->close();
	}else echo "faileds statement";

	echo $pic;
	
	$conn->close();
	
?>
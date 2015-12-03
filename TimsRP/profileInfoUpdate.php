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
	
	if ($stmt = $conn->prepare("UPDATE `users` SET firstname=?, lastname=?, email=?, sex=?, birthday=? WHERE userid=?")) {
		/* bind parameters for markers */
		$stmt->bind_param("sssids", $_POST["firstname"] ,$_POST["lastname"] ,$_POST["email"], $sex,$_POST["DOB"], $_COOKIE["loggedInUID"]);
		/* execute query */
		$rc = $stmt->execute();
		if ( false===$rc ) {
			printf("Errormessage: %s\n", $conn->error);
			echo "failed excecute";
		}
		/* close statement */
		$stmt->close();
		
		echo "<script>
		alert(\"Your profile has been updated!\");
		window.location.href='http://localhost/TimsRP/TimsRP/profile.php';
		</script>";	
	}else echo "faileds statement";
	$conn->close();
?>
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
	
	if ($stmt = $conn->prepare("SELECT `password` FROM `users` WHERE userid=?")) {
		
		$stmt->bind_param("s", $_COOKIE["loggedInUID"]);
		
		$stmt->execute();
		$stmt->bind_result($pass);
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
	
	if(strcmp($pass, $_POST["curPass"])==0)
	{
	
		if ($stmt = $conn->prepare("UPDATE `users` SET password=? WHERE userid=?")) {
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST["confirmPass"], $_COOKIE["loggedInUID"]);
			/* execute query */			
			$rc = $stmt->execute();
			if ( false===$rc ) {
				printf("Errormessage: %s\n", $conn->error);
				echo "failed excecute";
			}
			/* close statement */
			
			$stmt->close();
			
			echo "<script>
			alert(\"Your image has been updated!\");
			window.location.href='http://localhost/TimsRP/TimsRP/profile.php';
			</script>";	
		}else echo "faileds statement";
	}
	else{
		echo "<script>
		alert(\"Please enter your current password correctly!\");
		window.location.href='http://localhost/TimsRP/TimsRP/profile.php';
		</script>";		
	}
	
	$conn->close();
	
?>
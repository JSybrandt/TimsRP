<?php 

/*
Expects "gameid" and "description" and "img" to be defined in $_POST
*/
if(isset($_POST["gameid"])&&isset($_POST["description"]) && isset($_POST["img"])){

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
	
	if ($stmt = $conn->prepare("INSERT INTO `timsrp`.`games` ( `gameid`, `description`,`img`,`adminuserid`) VALUES (?, ?, ?, ?)")) {

		/* bind parameters for markers */
		$stmt->bind_param("ssss", $_POST["gameid"], $_POST["description"], $_POST["img"], $_COOKIE["loggedInUID"]);

		/* execute query */
		$rc = $stmt->execute();
		if ( false===$rc ) {
			echo "failed excecute";
		}

		/* close statement */
		$stmt->close();
	}else echo "failed statement";

	$conn->close();
	
}

?>
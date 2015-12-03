<?php 

/*
Expects "gameid" and "description" to be defined in $_POST
*/
if(isset($_POST["gameid"])&&isset($_POST["description"])){

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "timsrp";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	
	
	if ($stmt = $conn->prepare("INSERT INTO `timsrp`.`games` ( `gameid`, `description`) VALUES (?, ?)")) {

		/* bind parameters for markers */
		$stmt->bind_param("ss", $_POST["gameid"], $_POST["description"]);

		/* execute query */
		$stmt->execute();

		/* close statement */
		$stmt->close();
	}

	$conn->close();
	
}

?>
<?php 

/*
Expects "gameid" and "userid" to be defined in $_POST
*/

if(isset($_POST["gameid"])&&isset($_POST["userid"])){

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "timsrp";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);

	// Check connection
	if ($conn->connect_error) {
		echo 1;
		die("Connection failed: " . $conn->connect_error);
	} 

	
	if ($stmt = $conn->prepare("INSERT INTO `timsrp`.`GAME_USERS` ( `gameid`, `userid`) VALUES (?, ?)")) {

		/* bind parameters for markers */
		$stmt->bind_param("ss", $_POST["gameid"], $_POST["userid"]);

		/* execute query */
		$rc = $stmt->execute();
		if ( false===$rc ) {
			echo 1;
		}


		/* close statement */
		$stmt->close();
	}else echo 1;

	$conn->close();
	echo 0;
}else echo 1;

?>
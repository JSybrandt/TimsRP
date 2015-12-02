<?php 

/*
Expects "userId"  to be defined in $_POST
Returns # of users with that name (should be 1)
*/
if(isset($_POST["userid"])){

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
	
	if ($stmt = $conn->prepare("SELECT * FROM `timsrp`.`users` WHERE userid=?")) {

		/* bind parameters for markers */
		$stmt->bind_param("s", $_POST["userid"]);

		/* execute query */
		$stmt->execute();
		
		// get results
		$count=0;
		$res = $stmt->get_result();
		while($row = $res->fetch_array(MYSQLI_ASSOC)) {
		  //array_push($a_data, $row);
		  $count++;
		}
		echo $count;
		/* close statement */
		$stmt->close();
	}

	$conn->close();
	
}

?>
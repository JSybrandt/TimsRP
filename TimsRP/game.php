<?php
    session_start();     
	

	if(isset($_GET["gameid"])){
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
	
	$user = $_COOKIE["loggedInUID"];
	$game = $_POST["gameid"];
	
	$sqlcheck = "SELECT * FROM games WHERE adminuserid='".$user."' AND gameid='".$game."'";
	$resultadmin = $conn->query($sqlcheck);
	if($resultadmin === FALSE && $resultadmin->num_rows > 0) {
		setcookie("gameid",$game,time()+60*60*24*30);
	}
         	
	if ($stmt = $conn->prepare("SELECT gameid,description,img FROM `timsrp`.`games` WHERE gameid=?")) {
		/* bind parameters for markers */
		$stmt->bind_param("s", $_GET["gameid"]);

		/* execute query */
		$rc = $stmt->execute();
		if ( false===$rc ) {
			echo "failed excecute";
			die("FALLD");
		}
		
		global $imgSrc;
		global $desc;
		global $gameid;
		
		if ($result = $stmt->get_result()){
			
			while ($row = $result->fetch_array(MYSQLI_NUM))
			{
				$gameid=$row[0];
				$desc=$row[1];
				$imgSrc=$row[2];
				
			}
			
			
		}else echo "failed get_result";
        

		/* close statement */
		$stmt->close();
	}else echo "failed statement";

	$conn->close();
	
}
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Game List</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Site.css" />
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
	
</head>
<body>
    <?php include ("navbar.php"); ?>
    <div id="body" class="col-md-8">
		<div id="gameHeader">
			<img src=<?php echo $imgSrc;?> alt="RP image"/>
			<h1><?php echo $gameid;?></h1>	
		</div>
		<button id="new-post-btn" class="btn btn-success"> New Post </button>
		<div id="new-post-form">
			
			<textarea id="mytextarea"></textarea>
			<br>
			<button  class="btn btn-success" id="submit-post-btn"> Post </button>
			
		</div>
        <table id="gameRecord">		
		
		<?php 
		
		if(isset($_GET["gameid"])){

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
			
			if ($stmt = $conn->prepare("SELECT users.userid, content, picture FROM `game_post` JOIN USERS WHERE gameid=? ORDER BY timeofpost DESC")) {
				/* bind parameters for markers */
				$stmt->bind_param("s", $_GET["gameid"]);

				/* execute query */
				$rc = $stmt->execute();
				if ( false===$rc ) {
					echo "failed excecute";
					die("FALLD");
				}
								
				if ($result = $stmt->get_result()){
					
					while ($row = $result->fetch_array(MYSQLI_NUM))
					{
						echo "<tr><td class=\"charData\"><h3>".$row[0]."</h3><img class=\"charImg\" src=\"".$row[2]."\" alt=\"Player Image\"/></td><td class=\"postContent\">".$row[1]."</td></tr>";				
					}
					
					
				}else echo "failed get_result";
				

				/* close statement */
				$stmt->close();
			}else echo "failed statement";

			$conn->close();
	
		}
		
		?>
		
		
    </div>

    <footer>
        <div class="content-wrapper">
            <div class="float-left">
            </div>
        </div>
    </footer>
	
	<script src="game.js"></script>
</body>
</html>

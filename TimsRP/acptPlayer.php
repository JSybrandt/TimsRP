<?php
    session_start();
	
	if(isset($_COOKIE["loggedInUID"],$_GET["userid"],$_GET["gameid"])) {
		$servername = "localhost";
        $susername = "root";
        $password = "";
        $db = "timsrp";
        $conn = new mysqli($servername,$susername,$password,$db);
        if($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
        
        $user = $_GET["userid"];
        $game = $_GET["gameid"];
        
        $sql = "DELETE FROM game_requests WHERE userid='".$user."' AND gameid='".$game."'";
        $result = $conn->query($sql);
        if($result === FALSE) {
            header("HTTP/1.1 500 Internal Server Error");
            echo mysql_error(); // Detailed error message in the response body 
            die();
        }
        
        $stmt = $conn->prepare("INSERT INTO game_users (gameid,userid) VALUES (?,?)");
        if($stmt === FALSE) {
            header("HTTP/1.1 500 Internal Server Error");
            echo mysql_error(); // Detailed error message in the response body 
            die();
        }
        else {
            //echo "It prepared!<br/>";
            $stmt->bind_param("ss",$game,$user);
            
            $stmt->execute();
            $conn->commit();
            
            $stmt->close();
        }
	}
    else {
        header("HTTP/1.1 500 Internal Server Error");
        echo mysql_error(); // Detailed error message in the response body 
        die();
    }
	
?>
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
        
        $sql;
        if(isset($_GET["request"])) {
            $sql = "DELETE FROM game_requests WHERE userid='".$user."' AND gameid='".$game."'";
        }
        else {
            $sql = "DELETE FROM game_users WHERE userid='".$user."' AND gameid='".$game."'";
        }
        //$sql = "DELETE FROM game_users WHERE userid='".$user."'";
        $result = $conn->query($sql);
        if($result === FALSE) {
            header("HTTP/1.1 500 Internal Server Error");
            echo mysql_error(); // Detailed error message in the response body 
            die();
        }
	}
    else {
        header("HTTP/1.1 500 Internal Server Error");
        echo mysql_error(); // Detailed error message in the response body 
        die();
    }
	
?>
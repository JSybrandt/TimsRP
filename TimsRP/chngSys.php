<?php
	if(isset($_COOKIE["loggedInUID"],$_GET["sys"],$_GET["gameid"])) {
		$servername = "localhost";
        $susername = "root";
        $password = "";
        $db = "timsrp";
        $conn = new mysqli($servername,$susername,$password,$db);
        if($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
        
        $sys = $_GET["sys"];
        $id = $_GET["gameid"];
        $str;
        if($sys == 1) {
            $str = "Legend of the Five Rings";
        }
        else if($sys == 2) {
            $str = "Dungeons and Dragons";
        }
        else {
            $str = "Warhammer 40K";
        }
        echo $str;
        $sql = "UPDATE games SET systemname='".$str."' WHERE gameid='".$id."'";
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
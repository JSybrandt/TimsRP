<?php
    session_start();    

	if(isset($_POST["username"], $_POST["password"])) {
        
        unset($_COOKIE["loggedInUID"]); 
        
		$servername = "localhost";
        $susername = "root";
        $password = "";
        $db = "timsrp";
        $conn = new mysqli($servername,$susername,$password,$db);
        if($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
		
		$pswd = $_POST["password"];
		$user = $_POST["username"];
        
        $sql = "SELECT userid FROM users WHERE password='".$pswd."' and userid='".$user."'";
        //echo $sql."<br/>";
        $result = $conn->query($sql);
        //echo "printing: ";
        //print_r($result);
        if($result->num_rows > 0) {
            setcookie("loggedInUID",$user, time()+60*60*24*30);
        }
        else {
            setcookie("loginFail",TRUE, time()+60);
        }
	}
    else {
        setcookie("loginFail",TRUE, time()+60);
    }
	
	header("Location: index.php");
?>
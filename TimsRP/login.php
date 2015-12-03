<?php
    session_start();    
	
	unset($_SESSION["loggedInUID"]); 
	
	if(isset($_POST["username"], $_POST["password"])) {
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
            $_SESSION["loggedInUID"] = $user;
        }
        else {
            $_SESSION["loginFail"] = TRUE;
        }
	}
    else {
        $_SESSION["loginFail"] = TRUE;
    }
	
	header("Location: index.php");
?>
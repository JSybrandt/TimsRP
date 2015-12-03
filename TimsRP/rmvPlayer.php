<?php
    session_start();
	
	if(isset($_COOKIE["loggedInUID"],$_GET["userid"])) {
		$servername = "localhost";
        $susername = "root";
        $password = "";
        $db = "timsrp";
        $conn = new mysqli($servername,$susername,$password,$db);
        if($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
        
        //$sql = "SELECT userid FROM users WHERE password='".$pswd."' and userid='".$user."'";
        //echo $sql."<br/>";
        //$result = $conn->query($sql);
        //echo "printing: ";
        //print_r($result);
        if(FALSE) {
            //$_SESSION["loggedInUID"] = $user;
        }
        else {
            setcookie("rmvFail",TRUE, time()+60);
            //$_SESSION["rmvFail"] = TRUE;
        }
	}
    else {
        setcookie("rmvFail",TRUE, time()+60);
        //$_SESSION["rmvFail"] = TRUE;
    }
	
	header("Location: ".$_GET["return"]);
?>
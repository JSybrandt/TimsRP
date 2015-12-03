<?php
		$servername = "localhost";
        $susername = "root";
        $password = "";
        $db = "timsrp";
        $conn = new mysqli($servername,$susername,$password,$db);
        if($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
?>
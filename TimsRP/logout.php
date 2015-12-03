<?php
    session_start();    
	
	unset($_SESSION["loggedInUID"]); 
	header("Location: index.php");
?>
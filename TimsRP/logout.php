<?php
    session_start();    
	
	setcookie("loggedInUID",$_COOKIE["loggedInUID"],time()-1);
	unset($_COOKIE["loggedInUID"]);
	
	header("Location: index.php");
?>
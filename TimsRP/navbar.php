<?php 
    if(isset($_SESSION["loggedInUID"])) {
        include ("usernav.php");
    }
    else {
        include ("logginnav.php");
    }
?>


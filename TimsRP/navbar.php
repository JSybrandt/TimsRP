<?php 
    if(isset($_COOKIE["loggedInUID"])) {
        include ("usernav.php");
    }
    else {
        if(basename($_SERVER["REQUEST_URI"]) !== "index.php" && basename($_SERVER["REQUEST_URI"]) !== "registration.php") {
            header("Location: index.php");
            exit;
        }
        include ("logginnav.php");
    }
?>


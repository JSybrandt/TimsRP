<?php 
    if(isset($_SESSION["loggedInUID"])) {
        include ("usernav.php");
    }
    else {
        if($_SERVER["PHP_SELF"] !== "/timsrp/timsrp/index.php" && $_SERVER["PHP_SELF"] !== "/timsrp/timsrp/registration.php") {
            header("Location: index.php");
            exit;
        }
        include ("logginnav.php");
    }
?>


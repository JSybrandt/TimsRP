<?php
    session_start();
    if(isset($_COOKIE["loggedInUID"])) {
        header("Location: myGames.php"); //Prevent user from trying to register while logged in.
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>User Registration Form</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Site.css" />
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include ("navbar.php");?>
    <div id="body" class="col-md-8">
        <img src="gameHeader.png" class="img-responsive img-center" alt="Front Page Image"/>
    </div>
    <div class="col-md-4" id="signupform">
        <h1>User Registration</h1>
        <form action="registration.php" name="regform" id="regform" method="post">
            <label for="firstname">First name:</label>
            <input type="text" name="firstname">
            <br>
            <label for="lastname">Last name:</label>
            <input type="text" name="lastname">
            <br>
            <label for="username">Username:</label> <br/>
            <input type="text" name="username">
            <br>
            <label for="email">Email:</label> <br/>
            <input type="email" name="email">
            <br>
            <label for="sex">Sex:</label><br/>
            <div class="radiogroup">
                <div class="fieldgroup">
                    <input type="radio" name="sex" value="male"> Male
                </div>
                <div class="fieldgroup">
                    <input type="radio" name="sex" value="female"> Female
                </div>
            </div>
            <br>
            <label for="DOB">Date of birth:</label>
            <input type="date" name="DOB">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password">
            <br>
            <br>
            <input type="submit" value="Register" class="btn btn-success">
        </form>
        <br>
    </div>
    <footer>
        <div class="content-wrapper">
            <div class="float-left">
            </div>
        </div>
    </footer>
</body>
</html>

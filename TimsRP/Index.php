﻿<!DOCTYPE html>
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
    <?php include ("navbar.php"); ?>
    <div id="body" class="col-md-8">
        <img src="gameHeader.png" class="img-responsive img-center" alt="Front Page Image"/>
    </div>
    <div class="col-md-4" id="signupform">
        <h2>User Registration</h2>
        <form action="http://www.randyconnolly.com/tests/process.php" name="regform" id="regform" method="post">
            First name:<br>
            <input type="text" name="firstname">
            <br>
            Last name:<br>
            <input type="text" name="lastname">
            <br>
            Sex: <br>
            <div class="radiogroup">
                <div class="fieldgroup">
                    <input type="radio" name="sex" value="male"> Male
                </div>
                <div class="fieldgroup">
                    <input type="radio" name="sex" value="female"> Female
                </div>
            </div>

            <br>
            Date of birth:<br>
            <input type="date" name="DOB">
            <br>
            What are you interested in? <br>
            <select name="reglist" form="regform">
                <option value="GameMaster">Game Master</option>
                <option value="Player">Player</option>
                <option value="Spectator">Spectator</option>
            </select>
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
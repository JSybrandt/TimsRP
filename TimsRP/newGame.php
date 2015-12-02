<?php
    session_start();     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>New Game</title>
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
        <div id="body" class="container">
        <div class="row">
            <div class="div-box" id = "newGameField">
				<h1><b>Create a new RP</b></h1>
                <h3><b>Game Name: </b></h3><input type="text" id = "gameName" name="gameName" style="width:50%"><br/>
                <h4><b>Description: </b></h4>
                <textarea name="gamedescription" id = "gamedescription" cols="60" rows="2" placeholder="A brief description of your RP to get players interested and describe the adventure!"></textarea>
                <br/><br/>
                <h4><b>Participants: </b></h4><hr>
                <table id = "addPlayerList">
                    <thead>
                        <tr>
                            <th class="center-text">Player Name</th>
                            <th class="center-text">Email</th>
                            <th class="center-text"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id = "player1">
                            <td><b>Freaky C.</b></td>
                            <td>Freaky1@gmail.com</td>
                            <td><a class="btn btn-xs btn-danger" id="btnRemovePlayer1" >Remove</a></td>
                        </tr>
                        <tr id = "player2">
                            <td><b>John Cena</b></td>
                            <td>ucantseeme@gmail.com</td>
                            <td><a class="btn btn-xs btn-danger" id="btnRemovePlayer2" >Remove</a></td>
                        </tr>
                        <tr id = "player3">
                            <td><b>Mike Boom</b></td>
                            <td>salt@gmail.com</td>
                            <td><a class="btn btn-xs btn-danger" id="btnRemovePlayer3" >Remove</a></td>
                        </tr>
                        <tr>
                            <td>
                            Add Player: <input type="text" name="gameMembers" id="AddPlayerName" >    <a id="addMember" class="btn btn-s btn-success">Add</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
				<br/>
                <a id="saveNewRP" class="btn btn-xl btn-success">Create my Role Play!</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="content-wrapper">
            <div class="float-left">
            </div>
        </div>
    </footer>
        <script src="newGame.js"></script>

</body>
</html>

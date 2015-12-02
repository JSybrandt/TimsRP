<?php
    session_start();     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>My RPs</title>
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
     <div class="col-md-1">
        <h1><b>My Role Plays</b></h1>
        <a href ="newGame.php" id = "newRP" class ="btn btn-success">START A NEW RP</a>
    </div>
    <br/><br/>
    <div id="body" class="">
        <table id = "gameList">
            <tbody>
                <tr>
                    <td class="gameName">
                        <img class = "RPThumb" src="images/game.png" alt="thumbnail">
                        <div>
                            <h4><a href="game.php"><b>Dr. Wheiz's Zany Island Adventure</b></a></h4>
                            25 members, 4 here now
                        </div>
                    </td>
                    <td class="gameRepliesCount">
                        10 replies
                    </td>
                    <td class="gameUpdateHistory">
                        Updated by <a href="profile.php">Nalta</a>
                        <br/><p style="color:gray">about 25 min ago</p>
                    </td>
                </tr>
                <tr>
                    <td class="gameName">
                        <img class = "RPThumb" src="images/game2.png" alt="thumbnail">
                        <div>
                            <h4><a href="game.php"><b>Freaky C's Dank Memes</b></a></h4>
                            10 members, 1 here now
                        </div>
                    </td>
                    <td class="gameRepliesCount">
                        9 replies
                    </td>
                    <td class="gameUpdateHistory">
                        Updated by <a href="profile.php">FalseEcho</a>
                        <br/><p style="color:gray">Just now</p>
                    </td>
                </tr>
                <tr>
                    <td class="gameName">
                        <img class = "RPThumb" src="images/game3.png" alt="thumbnail">
                        <div>
                            <h4><a href="game.php"><b>Zard's Ghouls</b></a></h4>
                            17 members, 3 here now
                        </div>
                    </td>
                    <td class="gameRepliesCount">
                        20 replies
                    </td>
                    <td class="gameUpdateHistory">
                        Updated by <a href="profile.php">Reason</a>
                        <br/><p style="color:gray">about 35 min ago</p>
                    </td>
                </tr>
                <tr>
                    <td class="gameName">
                        <img class = "RPThumb" src="images/game.png" alt="thumbnail">
                        <div>
                            <h4><a href="game.php"><b>Ginger Zombies</b></a></h4>
                            12 members, 2 here now
                        </div>
                    </td>
                    <td class="gameRepliesCount">
                        15 replies
                    </td>
                    <td class="gameUpdateHistory">
                        Updated by <a href="profile.php">Astral</a>
                        <br/><p style="color:gray">about 5 min ago</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



    <footer>
        <div class="content-wrapper">
            <div class="float-left">
            </div>
        </div>
    </footer>
</body>
</html>

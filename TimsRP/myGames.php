<?php
    session_start();
    
    $servername = "localhost";
    $susername = "root";
    $password = "";
    $db = "timsrp";
    $conn = new mysqli($servername,$susername,$password,$db);
    if($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }
    $conn->autocommit(FALSE);
        
    $user = $_COOKIE["loggedInUID"];

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

                <?php
                    $gameid = [];
                    $requests = [];
                    $stmt = $conn->prepare("SELECT gameid FROM game_users WHERE userid=?");
                    $stmt->bind_param("s",$user);
                    if($stmt->execute()) {
                        $results = $stmt->get_result();
                        while($newRow = $results->fetch_assoc()) {
                            $gameid[] = $newRow["gameid"];
                        }
                    }
                    $stmt->close();
                    

                    foreach($gameid as $g){
                        $stmt = $conn->prepare("SELECT * FROM games WHERE gameid=?");
                        $stmt->bind_param("s",$g);
                        if($stmt->execute()) {
                            $results = $stmt->get_result();
                            while($newRow = $results->fetch_assoc()) {
                                $img = $newRow["img"];
                                $description = $newRow["description"];

                                echo '<tr>';
                                echo    '<td class="gameName">';
                                
                                echo        '<img class = "RPThumb" src="'.$img.'" alt = "thumbnail">';
                                echo        '<div>';
                                echo        '<h4><a href="game.php"><b>'.$description.'</b></a></h4>';
                                echo        '25 members, 4 here now';
                                echo        '</div>';
                                echo    '</td>';

                                echo    '<td class = "gameRepliesCount">';
                                echo        "10 replies";
                                echo    '</td>';
                                echo    '<td class = "gameUpdateHistory">';
                                echo        'Updated by <a href="profile.php">Nalta</a>';
                                echo        '<br/><p style= "color:gray">about 25 min ago</p>';
                                echo    '</td>';
                                echo '</tr>';
                            }
                        }
                        $stmt->close();
                    }
                    
                ?>

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

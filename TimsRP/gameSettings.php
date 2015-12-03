<?php
    session_start();
    
    if(!isset($_COOKIE["gameid"])) {
        header("Location: index.php");
    }
    
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
    $gameid = $_COOKIE["gameid"];
    //$gameid = "test";
    
    $sql = "SELECT * FROM games WHERE adminuserid='".$user."'";
    $result = $conn->query($sql);
    if($result === FALSE || $result->num_rows === 0) {
        //header("Location: index.php");
    }
    
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Tim's RP - Game Settings</title>
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
            <!--List of active players-->
            <div class="col-md-5 div-box">
                <h4><b>Players in Campaign</b></h4>
                <!--<form action="dbEdits/addPlayerToGame.php" name="invform" id="invform" method="post">-->
                    <input id="inviteName" type="text" placeholder="Username" name="userid" /> <button id="invBtn" type="button" class="btn btn-default">Invite</button>
                    <input type="hidden" id="gameid" name="gameid" value="<?php echo $gameid; ?>"/>
                    <span class="red-text invite hidden">Username invalid</span>
                <!--</form>-->
                <table class="table" id="playerTable">
                    <thead>
                        <tr>
                            <th class="center-text">Player Name</th>
                            <th class="center-text">Player Status</th>
                            <th class="center-text">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $players = [];
                        $requests = [];
                        $stmt = $conn->prepare("SELECT userid FROM game_users WHERE gameid=?");
				        $stmt->bind_param("s",$gameid);
                        if($stmt->execute()) {
                            $results = $stmt->get_result();
                            while($newRow = $results->fetch_assoc()) {
                                $players[] = $newRow["userid"];
                            }
                        }
                        $stmt->close();
                        
                        $stmt = $conn->prepare("SELECT userid FROM game_requests WHERE gameid=?");
				        $stmt->bind_param("s",$gameid);
                        if($stmt->execute()) {
                            $results = $stmt->get_result();
                            while($newRow = $results->fetch_assoc()) {
                                $requests[] = $newRow["userid"];
                            }
                        }
                        $stmt->close();
                        foreach($players as $player) {
                            echo "<tr id='".$player."'>";
                            echo "<td>".$player."</td>";
                            echo "<td>Active</td>";
                            echo "<td class='center-text'><a class='btn btn-xs btn-danger rmvPlayer' data-gameid='".$row["gameid"]."' data-player='".$player."'>Remove</a></td>";
                            echo "</tr>";
                        }
                        foreach($requests as $request) {
                            echo "<tr id='".$request."'>";
                            echo "<td>".$request."</td>";
                            echo "<td>Active</td>";
                            echo "<td id='".$request."Request' class='center-text'><a class='btn btn-xs btn-danger rmvRequest' data-gameid='".$row["gameid"]."' data-player='".$request.
                            "'>Remove</a> <a class='btn btn-xs btn-success addRequest' data-gameid='".$row["gameid"]."' data-player='".$request."'>Accept</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 div-box">
                <h4><b>Campaign Options</b></h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Game System</td>
                            <td id="rpStat"><?php echo $row["systemname"]; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Change <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a data-dropdown="rp" href="#" class="dropBtn sysBtn" data-sys="1" data-game="<?php echo $row["gameid"]; ?>">Legend of the Five Rings</a></li>
                                        <li><a data-dropdown="rp" href="#" class="dropBtn sysBtn" data-sys="2" data-game="<?php echo $row["gameid"]; ?>">Dungeons and Dragons</a></li>
                                        <li><a data-dropdown="rp" href="#" class="dropBtn sysBtn" data-sys="3" data-game="<?php echo $row["gameid"]; ?>">Warhammer 40K</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <footer>
        <div class="content-wrapper">
            <div class="float-left">
            </div>
        </div>
    </footer>
    
    <script src="js/gameSettings.js"></script>
</body>
</html>

<?php 
    $conn->close();
?>

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
    //$gameid = $_POST["gameid"];
    $gameid = "test";
    
    $sql = "SELECT adminuserid FROM games WHERE userid='".$user."'";
    echo $sql."<br/>";
    $result = $conn->query($sql);
    if($result === FALSE || $result->num_rows === 0) {
        //header("Location: index.php");
    }
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
<?php 

?>
<div id="body" class="container">
        <div class="row">
            <!--List of active players-->
            <div class="col-md-5 div-box">
                <h4><b>Players in Campaign</b></h4>
                <form>
                    <input id="inviteName" type="text" placeholder="Username" /> <button type="submit" class="btn btn-default">Invite</button>
                </form>
                <table class="table">
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
                        $stmt = $conn->prepare("SELECT userid FROM game_users WHERE gameid=?");
				        $stmt->bind_param("s",$gameid);
                        if($stmt->execute()) {
                            $results = $stmt->get_result();
                            while($row = $results->fetch_assoc()) {
                                $players[] = $row["userid"];
                            }
                            // echo "<pre>";
                            // print_r($players);
                            // echo "</pre>";
                        }
                        $stmt->close();
                        foreach($players as $player) {
                            echo "<tr id='".$player."'>";
                            echo "<td>".$player."</td>";
                            echo "<td>Active</td>";
                            echo "<td class='center-text'><a class='btn btn-xs btn-danger rmvPlayer' data-player='".$player."'>Remove</a></td>";
                            echo "</tr>";
                        }
                        ?>
                        
                        <!--<tr id="player1">
                            <td>John Doe</td>
                            <td>Active</td>
                            <td class="center-text"><a id="player1Rmv" class="btn btn-xs btn-danger">Remove</a></td>
                        </tr>
                        <tr id="player2">
                            <td>Jane Doe</td>
                            <td>Invited</td>
                            <td class="center-text"><a id="player2Rmv" class="btn btn-xs btn-danger">Remove</a></td>
                        </tr>
                        <tr id="player3">
                            <td>Friend Frank</td>
                            <td id="player3Stat">Requested to join</td>
                            <td class="center-text"><a id="player3Rmv" class="btn btn-xs btn-danger">Decline</a> <a id="player3Add" class="btn btn-xs btn-success">Accept</a></td>
                        </tr>-->
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 div-box">
                <h4><b>Campaign Options</b></h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Campaign Visibility</td>
                            <td id="visStat">Invite Only</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Change <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a data-dropdown="vis" href="#" class="dropBtn">Public</a></li>
                                        <li><a data-dropdown="vis" href="#" class="dropBtn">Invite Only</a></li>
                                        <li><a data-dropdown="vis" href="#" class="dropBtn">Private</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Game System</td>
                            <td id="rpStat">Legend of the Five Rings</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Change <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a data-dropdown="rp" href="#" class="dropBtn">Legend of the Five Rings</a></li>
                                        <li><a data-dropdown="rp" href="#" class="dropBtn">Dungeons and Dragons</a></li>
                                        <li><a data-dropdown="rp" href="#" class="dropBtn">Warhammer 40k</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Notifications</td>
                            <td id="notifStat">All Messages</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Change <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a data-dropdown="notif" href="#" class="dropBtn">All Messages</a></li>
                                        <li><a data-dropdown="notif" href="#" class="dropBtn">Private Messages Only</a></li>
                                        <li><a data-dropdown="notif" href="#" class="dropBtn">No Messages</a></li>
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

<?php 

if(!isset($_POST["firstname"], $_POST["lastname"],$_POST["email"],$_POST["sex"],$_POST["DOB"],$_POST["password"], $_POST["username"])) {
    header("Location: index.php");
}        
        
$error;
$sex;
if($_POST["sex"] === "male") { $sex = 1; }
else { $sex = 0; }
$first = $_POST["firstname"];
$last = $_POST["lastname"];
$email = $_POST["email"];
$dob = $_POST["DOB"];
$pswd = $_POST["password"];
$user = $_POST["username"];
$picture = "http://volumeone.org/uploads/image/article/007/060/7060/header_custom/7060_52121_688_blank_avatar_220.png";

$servername = "localhost";
$susername = "root";
$password = "";
$db = "timsrp";
$conn = new mysqli($servername,$susername,$password,$db);
if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$sql = "SELECT userid FROM users WHERE email='".$_POST["email"]."' OR userid='".$user."'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    $error = "Error: Email or Username already exists<br/>";
}
else {
    $row = $result->fetch_assoc();
    $conn->autocommit(FALSE);
        
    $stmt = $conn->prepare("INSERT INTO users (userid,firstname,lastname,email,picture,sex,birthday,password) VALUES (?,?,?,?,?,?,?,?)");
    if($stmt === FALSE) {
        $error = "Failed to prepare statement<br/>";
    }
    else {
        $stmt->bind_param("sssssiss",$user,$first,$last,$email,$picture,$sex,$dob,$pswd);
        
        $stmt->execute();
        $conn->commit();
        
        $stmt->close();

        setcookie("loggedInUID",$user, time()+60*60*24*30);
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Registration</title>
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
    <div id="body" class="col-md-12 text-center">
		<?php 
        if(isset($error)) {
            echo $error;
        }
        else {
            echo "Welcome ".$_POST["firstname"]." ".$_POST["lastname"]." with username ".$user."!<br/>";
            echo "You have successfully signed up!<br/>";
        }
        ?>
        <a class="btn btn-default" href="Index.php">BACK</a>
	</div>
</body>
</html>

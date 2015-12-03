<?php 
    session_start();

    if(!isset($_POST["firstname"], $_POST["lastname"],$_POST["email"],$_POST["sex"],$_POST["DOB"],$_POST["password"], $_POST["username"])) {
        header("Location: index.php");
    }        
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
        // echo"<pre>";
        // print_r($_POST);
        // echo"</pre>";
        
        $sex;
        if($_POST["sex"] === "male") { $sex = 1; }
        else { $sex = 0; }
        $first = $_POST["firstname"];
        $last = $_POST["lastname"];
        $email = $_POST["email"];
        $dob = $_POST["DOB"];
        $pswd = $_POST["password"];
        $user = $_POST["username"];
        
        
        $servername = "localhost";
        $susername = "root";
        $password = "";
        $db = "timsrp";
        $conn = new mysqli($servername,$susername,$password,$db);
        if($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
        
        $sql = "SELECT userid FROM users WHERE email='".$_POST["email"]."' OR userid='".$user."'";
        //echo $sql."<br/>";
        $result = $conn->query($sql);
        //echo "printing: ";
        //print_r($result);
        if($result->num_rows > 0) {
            echo "Error: Email already exists<br/>";
        }
        else {
            $row = $result->fetch_assoc();
            $conn->autocommit(FALSE);
                
            //$stmt = $conn->prepare("INSERT INTO users (userid, firstname,lastname,email,sex,birthday,password) VALUES (DEFAULT,?,?,?,?,?,?)");
            $stmt = $conn->prepare("INSERT INTO users (userid,firstname,lastname,email,sex,birthday,password) VALUES (?,?,?,?,?,?,?)");
            if($stmt === FALSE) {
                echo"Failed to prepare statement<br/>";
            }
            else {
                //echo "It prepared!<br/>";
                $stmt->bind_param("ssssiss",$user,$first,$last,$email,$sex,$dob,$pswd);
                
                $stmt->execute();
                $conn->commit();
                
                $stmt->close();
    
                $_SESSION["loggedInUID"] = $user;
                echo "Welcome ".$_POST["firstname"]." ".$_POST["lastname"]." with username ".$_SESSION["loggedInUID"]."!<br/>";
                echo "You have successfully signed up!<br/>";
            }
        }
        $conn->close();
        ?>
        
	</div>
</body>
</html>

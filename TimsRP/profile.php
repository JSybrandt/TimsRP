<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Site.css" />
	<link rel="stylesheet" href="profile.css" />
	<script src="profile.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
	<?php include ("navbar.php"); ?>
 	<div id="body">
	
		<div id="Title" class="col-md-12">
			My Profile
		</div>
		
		
		
		<div class="col-md-12">
			<h2>My Avatar</h2>
			<img id="avatar" src="http://volumeone.org/uploads/image/article/007/060/7060/header_custom/7060_52121_688_blank_avatar_220.png" alt="Avatar"/>
			<input type="file" class="imagePick" name="dataFile" id="fileChooser" onchange="return ValidateFileUpload()"  />
		</div>
		
		<div class="col-xs-12 informationForm">
			<h2>General Information</h2>
			<form name="GenInfo" id="GenInfo" onsubmit="return validateGenInfo()" method="post">
				First name:<br>
				<input type="text" name="firstname" required>
				<br>
				Last name:<br>
				<input type="text" name="lastname" required>
				<br>
				   
				Email:<br>
				<input type="text" name="email" id="email" required>
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
				<br>
				<input type="submit" value="Update" class="btn btn-success">
			</form>
		</div>
        <br>
		<br>
		
		<div class="col-xs-12 informationForm" style="padding-bottom:10px;">
			<h2>Password</h2>
			
			<form name="PassForm" onsubmit="return confirmPassword()" method="post">
				Current Password:<br>
				<input type="password" name="curPass">
				<br>
				New Password:<br>
				<input type="password" name="newPass">
				<br>
				Confirm Password:<br>
				<input type="password" name="confirmPass">
				<br>
				<br>
				<input type="submit" value="Set New Password" class="btn btn-success">
			</form>
			<br>
		</div>
		
		<div class="gameTable">
		<h2>My Games</h2>
		<br>
			<table class="col-xs-12 table">
				<thead>
					<tr>
						<th>Game Name</th>
						<th>Game Owner</th>
						<th>Players In Game</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> Kewl Game </td>
						<td> Dark_Overlord </td>
						<td> 3 </td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
    
    <footer>
        <div class="content-wrapper">
            <div class="float-left">
            </div>
        </div>
    </footer>
</body>
</html>

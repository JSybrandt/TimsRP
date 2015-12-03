<?php
    session_start();     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Thread - Some Game</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Site.css" />
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
	
</head>
<body>
    <?php include ("navbar.php"); ?>
   <div id="body" class="col-md-8">
        <h2>New Post</h2>
        <form action="http://www.randyconnolly.com/tests/process.php" name="regform" id="regform" method="post">
			<textarea id="mytextarea"></textarea>
            <button  class="btn btn-success"> Post </button>
        </form>
        <br>

		<table id="gameRecord">
		<tr>
			<td class="charData"><!--Post Metadata-->
				<h3>Jeff</h3>
				<img class="charImg" src="images/p4.jpg" alt="Avatar"/>
			</td>
			<td class="postContent"><!--Post Content-->
				I throw my ax at the beast!
				I rolled a 6.
			</td>
		</tr>
		<tr>
			<td class="charData"><!--Post Metadata-->
				<h3>Samson</h3>
				<img class="charImg" src="images/p3.jpg" alt="Avatar"/>
			</td>
			<td class="postContent"><!--Post Content-->
				I grab my lance, and whisle for my horse, hopefully Bertrude was able to handle the warpigs. I scan the area for a distraction. 12 on perception.
			</td>
		</tr>
		<tr>
			<td class="charData"><!--Post Metadata-->
				<h3>Maxwell</h3>
				<img class="charImg" src="images/p2.jpg" alt="Avatar"/>
			</td>
			<td class="postContent"><!--Post Content-->
				Aldo, you're lucky that talking is a free action, I grab my staff and start chanting cone of frost. 16 for casting.
			</td>
		</tr>
		<tr>
			<td class="charData"><!--Post Metadata-->
				<h3>Aldo</h3>
				<img class="charImg" src="images/p1.jpg" alt="Avatar"/>
			</td>
			<td class="postContent"><!--Post Content-->
				Pigs again?! I draw my sword, and yell to the heavens, "GM NEEDS BETTER MOOKS!"
			</td>
		</tr>
		<tr>
			<td class="charData"><!--Post Metadata-->
				<h3>GM</h3>
			</td>
			<td class="postContent"><!--Post Content-->
				You all find yourselves in a forest surrounded by angry looking feral pigs. In front of you is the largest warthog you have ever seen. The other animals seem content watching the fight, and form a tight circle around you all.
			</td>
		</tr>
		</table>
		
		
    </div>
    <div class="col-md-4" id="signupform">
        <h2>My Games</h2>
		<hr>
		<a href="game.php">
			<img src="images/game.png" alt="game icon"/>
			<h3>Dr. Wheiz's Zany Island Adventure</h3>
		</a>
    </div>
    <footer>
        <div class="content-wrapper">
            <div class="float-left">
            </div>
        </div>
    </footer>
    
    <script type="text/javascript">
        
    </script>
</body>
</html>

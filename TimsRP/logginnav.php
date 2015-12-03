<header>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Tim's RP</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Campaigns <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="myGames.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> My Campaigns</a></li>
							<li><a href="newGame.php"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create Campaign</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a class="navbar-brand" data-toggle="modal" data-target="#myModal" href="#">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" <?php if(isset($_COOKIE["loginFail"])) { echo "data-show='true'";} ?> >
  	<div class="modal-dialog" role="document">
		<form action="login.php" name="loginform" id="loginform" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Login</h4>
				</div>
				<div class="modal-body">
					<h4 class="red-text">
					<?php
					if(isset($_COOKIE["loginFail"])) {
						setcookie("loginFail",$_COOKIE["loginFail"],time()-1);
						unset($_COOKIE["loginFail"]);
						echo "Bad Password/Username".PHP_EOL;
						echo "<script>jQuery( function(){jQuery('#myModal').modal();} )</script>";
					}
					 ?></h4>
					<label for="username">Username:</label>
					<input type="text" name="username">
					<br>
					<label for="password">Password:</label>
					<input type="password" name="password">
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</div>
		</form>
	</div>
</div>
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
				<a class="navbar-brand" href="myGames.php">Tim's RP</a>
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
				<ul class="nav navbar-nav">
					<li><a href="gameSettings.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Campaign Settings</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $_COOKIE["loggedInUID"]; ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="profile.php"> Profile </a></li>
							<li><a href="logout.php"> Logout </a><li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
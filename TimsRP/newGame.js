var newGame = {
	totalPlayers: 3,
	init: function(){
		newGame.UpdateEventListeners();
		document.getElementById("addMember").addEventListener("click", function() {newGame.AddPlayer()}, false);
		document.getElementById("saveNewRP").addEventListener("click", function() {newGame.CreateRP()}, false);
	},

	UpdateEventListeners: function(){


		var table = document.getElementById("addPlayerList");
		for (index = 1;index < table.rows.length-1;index++){
			var row = table.rows[index];
			//var col = row.columns[2];
			var col = row.cells[2];
			col.innerHTML = "";
			col.innerHTML = '<a class="btn btn-xs btn-danger" id="btnRemovePlayer3" >Remove</a>';
		}

		var removebtns = document.getElementsByClassName("btn-danger");
		var index;
		for (index = 0; index < removebtns.length; index++) {
				//removebtns[index].removeEventListener("click",newGame.RemovePlayer);
				removebtns[index].addEventListener("click",newGame.RemovePlayer(index),false);
				//removebtns[index].remove();
		}
	},

	RemovePlayer: function(index){
		//closure!
		return function(){
			newGame.totalPlayers = newGame.totalPlayers -1;
			var table = document.getElementById("addPlayerList");
			table.rows[index+1].remove();

			newGame.UpdateEventListeners();
			//console.log(index);
			//document.getElementById(player).remove();
			//newGame.totalPlayers = newGame.totalPlayers - 1;
		}
	},

	AddPlayer: function(){

		var player = document.getElementById("AddPlayerName").value;
		if (player == ""){
			alert("Please enter a player name");
			return;
		}

		//do additional backend verification before proceeding to lookup the user's email

		//console.log("Adding Player");
		var table = document.getElementById("addPlayerList");
		newGame.totalPlayers = newGame.totalPlayers +1;
		var row = table.insertRow(newGame.totalPlayers);//append to the end of the table
		var colName = row.insertCell(0);
		var colEmail = row.insertCell(1);
		var colAction = row.insertCell(2);

		colName.innerHTML = document.getElementById("AddPlayerName").value.bold();
		colEmail.innerHTML = "email@website.com";
		colAction.innerHTML = '<a class="btn btn-xs btn-danger" id="btnRemovePlayer3 tag = "btnRemovePlayer">Remove</a>';

		newGame.UpdateEventListeners();
		
	},

	CreateRP: function(){
		//client side form validation before submitting

		var gameName = document.getElementById("gameName").value;
		var gameDescription = document.getElementById("gamedescription").value;
		if (gameName == ""){
			alert("Please enter a game name");
			return;
		}
		else if (gameDescription ==  ""){
			alert("Please enter a game description");
			return;
		}
		else if (newGame.totalPlayers == 0){
			alert("Please add players before continuing");
			return;
		}
		else{
			window.location = 'gameSettings.php';   
		}
	}
}

newGame.init();
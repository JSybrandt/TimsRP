var newGame = {
	totalPlayers: 3,
	init: function(){
		document.getElementById("btnRemovePlayer1").addEventListener("click",function() {newGame.RemovePlayer("player1")},false);
		document.getElementById("btnRemovePlayer2").addEventListener("click",function() {newGame.RemovePlayer("player2")},false);
		document.getElementById("btnRemovePlayer3").addEventListener("click",function() {newGame.RemovePlayer("player3")},false);
		document.getElementById("addMember").addEventListener("click", function() {newGame.AddPlayer()}, false);
	},

	RemovePlayer: function(player){
		document.getElementById(player).remove();
		newGame.totalPlayers = newGame.totalPlayers - 1;
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

		colName.innerHTML = document.getElementById("AddPlayerName").value;
		colEmail.innerHTML = "email@website.com";
		colAction.innerHTML = '<a class="btn btn-xs btn-danger" id="btnRemovePlayer3">Remove</a>';
	}
}

newGame.init();
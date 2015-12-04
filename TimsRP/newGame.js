var newGame = {
	totalPlayers: 0,
	init: function(){
		newGame.UpdateEventListeners();
		document.getElementById("addMember").addEventListener("click", function() {newGame.AddPlayer()}, false);
		document.getElementById("saveNewRP").addEventListener("click", function() {newGame.CreateRP()}, false);
	},
	setCookie: function (cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	},
	UpdateEventListeners: function(){


		var table = document.getElementById("addPlayerList");
		for (index = 1;index < table.rows.length;index++){
			var row = table.rows[index];
			//var col = row.columns[2];
			var col = row.cells[1];
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
			table.rows[index].remove();

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

		var jqxhr = $.post( "dbEdits/playerExists.php",{userid:player});
		jqxhr.done(function(msg){if(msg!=0){
			
			//console.log("Adding Player");
			var table = document.getElementById("addPlayerList");
			newGame.totalPlayers = newGame.totalPlayers ;
			var row = table.insertRow(newGame.totalPlayers);//append to the end of the table
			newGame.totalPlayers++;
			var colName = row.insertCell(0);
			//var colEmail = row.insertCell(1);
			var colAction = row.insertCell(1);

			colName.innerHTML = document.getElementById("AddPlayerName").value;
			//colEmail.innerHTML = "email@website.com";
			colAction.innerHTML = '<a class="btn btn-xs btn-danger" id="btnRemovePlayer3 tag = "btnRemovePlayer">Remove</a>';

			newGame.UpdateEventListeners();
			
		}else alert("Not a valid player.");});
		jqxhr.fail(function(){alert("Error getting players.")});
		
		
		
	},

	CreateRP: function(){
		//client side form validation before submitting

		var gameName = document.getElementById("gameName").value;
		var gameDescription = document.getElementById("gamedescription").value;
		var imgLink = $("#gameImg").val();
		
		//console.log("img:"+imgLink);
		
		if (gameName == ""){
			alert("Please enter a game name");
			return;
		}
		else if (gameDescription ==  ""){
			alert("Please enter a game description");
			return;
		}
		else if (imgLink ==  ""){
			alert("Please enter an image link.");
			return;
		}
		else if (newGame.totalPlayers == 0){
			alert("Please add players before continuing");
			return;
		}
		
		var jqxhr = $.post( "dbEdits/addGame.php",{gameid:gameName, description:gameDescription, img:imgLink});
		
		jqxhr.done(function(msg){
			console.log(msg);
			
			$('#addPlayerList tr').each(function() {
				var userName = $(this).find("td:first").html();    
				console.log("attempting to add "+userName);
				var send = $.post( "dbEdits/addPlayerToGame.php",{gameid:gameName,userid:userName});
				send.done(function(msg){if(msg!=0)
					alert("failed to add "+userName +"\n"+msg);
				});
			});
			
			newGame.setCookie("gameid",gameName, 30);
			
			window.location = 'gameSettings.php';
		});
		jqxhr.fail(function(){alert("Error posting game.")});
		
		
	}
}

newGame.init();



//ValidateFileUpload taken from the author newbieinjavaversion2 from the following URL:
//http://stackoverflow.com/questions/21396279/display-image-and-validation-of-image-extension-before-uploading-file-using-java
function ValidateFileUpload() {
	var fuData = document.getElementById('fileChooser');
    var FileUploadPath = fuData.value;

	//To check if user upload any file
    if (FileUploadPath == '') {
        alert("Please upload an image");

        } else {
        var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

	//The file uploaded is an image

	if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
		// To Display
		if (fuData.files && fuData.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {$('#avatar').attr('src', e.target.result);}
			reader.readAsDataURL(fuData.files[0]);
			}
    } 

	//The file upload is NOT an image
	else {
			alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");

		}
	}
}
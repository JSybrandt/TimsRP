var RJG = {
	init: function(){
		//newGame.UpdateEventListeners();
		//document.getElementById("requestRP").addEventListener("click", function() {RJG.requestgame()}, false);
	},


	requestgame: function(gid, uid, btnid){
		//client side form validation before submitting
		
		//console.log(btnid);
		$("#" + btnid).html("Request Sent!");
		
		var jqxhr = $.post( "dbEdits/addPlayerToRequest.php",{gameid:gid, userid: uid });
		
		jqxhr.done(function(msg){
			//console.log(msg);
			
			//window.location = 'requestJoinGame.php';
		});
		jqxhr.fail(function(){alert("Error requesting game.")});
		
	}
}

RJG.init();
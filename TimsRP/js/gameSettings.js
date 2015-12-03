
var settings = {
	totalPlayers: 3, 		// Hard-set until we have a real list of players
	init: function () {
		
		$(".rmvPlayer").each(function() {
			var name = $(this).data("player");
			var url = window.location.href;
			$(this).on("click",function(){
				var str = "rmvPlayer.php?userid="+name+"&return="+url;
				$.get(str)
				.done(function(data) {
					$("#"+name).empty();
				})
				.fail(function(jqHXR){
					console.log("ERROR: Failed to load ajax");
				});

			});
		});	
		// var dropBtns = document.getElementsByClassName("dropBtn");
		
		// var index;
		// for (index = 0; index < dropBtns.length; ++index) {
		// 		var drop = dropBtns[index].dataset["dropdown"];
		// 		var dropText = dropBtns[index].textContent;
		// 		//var dropText = dropBtns[index].
		// 		dropBtns[index].addEventListener("click",settings.setOption(drop,dropText),false);
		// }
		
		// document.getElementById("player1Rmv").addEventListener("click",function() {settings.kill("player1")},false);
		// document.getElementById("player2Rmv").addEventListener("click",function() {settings.kill("player2")},false);
		// document.getElementById("player3Rmv").addEventListener("click",function() {settings.kill("player3")},false);
		// document.getElementById("player3Add").addEventListener("click",function() {settings.accept("player3")},false);	
	},
	kill: function(player) {
		document.getElementById(player).remove();
	},
	accept: function(player) {
		document.getElementById(player+"Add").remove();
		document.getElementById(player+"Rmv").innerText = "Remove";
		document.getElementById(player+"Stat").innerText = "Active";
			
	},
	invite: function(playerName) {
		// Should add the user to the bar and ajax a request
		settings.totalPlayers += 1;
		// Will write the html of the new player using the new total.
		
	},
	setOption: function(elementId,dropText) {
		return function() {
			console.log(elementId);
			document.getElementById(elementId+"Stat").innerText = dropText;
		}
	}
	
}

settings.init();
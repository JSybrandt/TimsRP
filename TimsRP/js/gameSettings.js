
var settings = {
	totalPlayers: 3, 		// Hard-set until we have a real list of players
	init: function () {
		
		$(".rmvPlayer").each(function() {
			var name = $(this).data("player");
			var game = $(this).data("gameid");
			var url = window.location.href;
			$(this).on("click",function(){
				var str = "rmvPlayer.php?userid="+name+"&gameid="+game+"&return="+url;
				$.get(str)
				.done(function(data) {
					$("#"+name).empty();
				})
				.fail(function(jqHXR){
					console.log("ERROR: Query failed");
				});

			});
		});
		$(".rmvRequest").each(function() {
			var name = $(this).data("player");
			var game = $(this).data("gameid");
			var url = window.location.href;
			$(this).on("click",function(){
				var str = "rmvPlayer.php?userid="+name+"&gameid="+game+"&request=true"; //"&return="+url+
				$.get(str)
				.done(function(data) {
					$("#"+name).empty();
				})
				.fail(function(jqHXR){
					console.log("ERROR: Query failed");
				});

			});
		});
		
		$(".addRequest").each(function() {
			var name = $(this).data("player");
			var game = $(this).data("gameid");
			var url = window.location.href;
			console.log("Player: "+name+" Game: "+game);
			$(this).on("click",function(){
				var str = "addPlayer.php?userid="+name+"&gameid="+game; //"&return="+url+
				$.get(str)
				.done(function(data) {
					$("#"+name+"Request").empty();
					$("#"+name+"Request").append("<a class='btn btn-xs btn-danger rmvPlayer' data-gameid='"+game+"' data-player='"+name+"'>Remove</a></td>");
				})
				.fail(function(jqHXR){
					console.log("ERROR: Query failed");
				});

			});
		});
		
		$(".sysBtn").each(function() {
			var sys = $(this).data("sys");
			var game = $(this).data("game");
			var url = window.location.href;
			//console.log("Sys: "+sys+" Game: "+game);
			$(this).on("click",function(){
				var str = "chngSys.php?sys="+sys+"&gameid="+game+"&return="+url;
				$.get(str)
				.done(function(data) {
					$("#rpStat").text(data);
					//alert(data);
				})
				.fail(function(jqHXR){
					console.log("ERROR: Query failed");
				});

			});
		});	
		
		
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
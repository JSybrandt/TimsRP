
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
			//console.log("Player: "+name+" Game: "+game);
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
		
		
	}
}

settings.init();

var settings = {
	init: function () {
		
		$(".rmvPlayer").each(function() {
			var name = $(this).data("player");
			var game = $(this).data("gameid");
			var url = window.location.href;
			console.log(name+" "+game);
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

			$(this).on("click",function(){
				var str = "rmvPlayer.php?userid="+name+"&gameid="+game+"&request=true";
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
			$(this).on("click",function(){
				var str = "acptPlayer.php?userid="+name+"&gameid="+game; //"&return="+url+
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
			$(this).on("click",function(){
				var str = "chngSys.php?sys="+sys+"&gameid="+game+"&return="+url;
				$.get(str)
				.done(function(data) {
					$("#rpStat").text(data);
				})
				.fail(function(jqHXR){
					console.log("ERROR: Query failed");
				});

			});
		});	
		
		$("#invBtn").on("click", function(){
			var player = $("#inviteName").val();
			var game = $("#gameid").val();
			if (player  === '') {
				$(".invite").text("No username");
				$(".invite").removeClass("hidden");
				return false;
			}
			else {
				$(".invite").toggleClass("hidden", true);
			}
	
			//do additional backend verification before proceeding to lookup the user's email
	
			var jqxhr = $.post( "dbEdits/playerExists.php",{userid:player});
			jqxhr.done(function(msg){
				if(msg!=0){
					$.post( "dbEdits/addPlayerToGame.php",{userid:player,gameid:game})
					.done(function() {
						var str = "<tr id='"+player+"Row'>"+
							"<td>"+player+"</td><td>Active</td><td class='center-text'><a class='btn btn-xs rmvPlayer btn-danger' id='"+player+"Btn' data-gameid='"+game+"' data-player='"+player+"'>Remove</a></td></tr>";
						var url = window.location.href;
						$("#playerTable").append(str);
						var tag = "#"+player+"Btn";
						//alert(tag);
						$(tag).on("click",function(){
							//alert("Test");
							var str = "rmvPlayer.php?userid="+player+"&gameid="+game+"&return="+url;
							$.get(str)
							.done(function(data) {
								$("#"+player+"Row").remove();
							})
							.fail(function(jqHXR){
								console.log("ERROR: Query failed");
							});
						});
						
						
					})
					.fail(function(jqHXR){
						$(".invite").text("No username");
						$(".invite").removeClass("hidden");
						console.log("ERROR: Query failed");
					});
				}
				else {
					$(".invite").text("User does not exist");
					$(".invite").removeClass("hidden");
				}
			});
			jqxhr.fail(function(){
				$(".invite").text("Play");
				$(".invite").removeClass("hidden");
				console.log("ERROR: Query failed");
			});
		});	
	}
}

settings.init();
//stack overflow
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

//stack overflow
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

var submitPost = new function(){
	
	
	
	this.onLoad = function(){
		
		
		
		$("#new-post-form *").hide();
		
		
		
		$("#new-post-btn").click(function(e){
			$("#new-post-form *").show();
			tinymce.init({selector: "#mytextarea"});
			$("#new-post-btn").hide();
		});
		
		$("#submit-post-btn").click(function(e){
			var gameName=getUrlParameter("gameid");
			var userName=getCookie('loggedInUID');
			var content=tinyMCE.activeEditor.getContent({format : 'raw'});
			console.log("Attempting:"+gameName+userName+content);
			var jqxhr = $.post( "dbEdits/addPostToGame.php",{gameid:gameName, userid:userName, content:content});
		
			jqxhr.done(function(msg){
				console.log(msg);
				
				location.reload();
			});
		});
		
	};
	
}();


submitPost.onLoad();




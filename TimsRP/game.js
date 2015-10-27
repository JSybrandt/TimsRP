var submitPost = new function(){
	
	
	this.onLoad = function(){
		
		
		
		$("#new-post-form *").hide();
		
		
		
		$("#new-post-btn").click(function(e){
			$("#new-post-form *").show();
			tinymce.init({selector: "#mytextarea"});
			$("#new-post-btn").hide();
		});
		
	};
	
}();


submitPost.onLoad();


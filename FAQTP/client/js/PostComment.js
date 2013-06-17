function postComment() {
	
	var commentText = document.CommentFormular.textfeld.value;
	
	$("#QContainer").html("<div> </div>");
	$.ajax({
		type: 		"POST",
		url: 		"../site/askQuestion.php",
		dataType: 	"html",
		success: 	function(form){
				$("#QContainer").append($(form));
		}
	});	

	document.getElementById("TestComment").innerHTML = commentText;
	
	alert("Post Comment" + commentText);
}
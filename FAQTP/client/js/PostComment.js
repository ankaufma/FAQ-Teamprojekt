function postComment() {
	console.log('hhihi');
	$("#QContainer").html("<div> </div>");
	$.ajax({
		type: 		"POST",
		url: 		"../site/askQuestion.php",
		dataType: 	"html",
		success: 	function(form){
				$("#QContainer").append($(form));
		}
	});
}
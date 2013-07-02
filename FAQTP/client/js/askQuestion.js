function askQuestion() {

	$("#QContainer").html("<div> </div>");
	$.ajax({
		async: 		false,
		type: 		"POST",
		url: 		"../site/askQuestion.php",
		dataType: 	"html",
		success: 	function(form){
				$("#QContainer").append($(form));
		}
	});
}
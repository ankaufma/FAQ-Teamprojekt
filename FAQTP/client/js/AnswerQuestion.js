function answerQuestion() {

	$("#QContainer").html("<div> </div>");
	$.ajax({
		async: 		false,
		type: 		"POST",
		url: 		"../site/aw1.php",
		dataType: 	"html",
		success: 	function(form){
				$("#QContainer").append($(form));
		}
	});
}
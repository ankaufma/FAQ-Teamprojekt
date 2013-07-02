function answerQuestion() {

	$("#QContainer").html("<div> </div>");
	$.ajax({
		type: 		"POST",
		url: 		"../site/aw1.php",
		dataType: 	"html",
		success: 	function(form){
				$("#QContainer").append($(form));
		}
	});
}
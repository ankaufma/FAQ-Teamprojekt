function findQuestion(text) {
	$("#searchResults").empty();
	$.ajax({
		async:		false,
		type: 		"POST",
		url: 		"../server/questionByText.php",
		data: {		"text" : text,	},
		dataType: 	"html",
		success: 	function(questions){
				$("#searchResults").append($("<option>"+questions+"</option>"));
		}
	});
}

function loadQuestionsByText(text) {
	$("#QContainer").html($(""));
	$.ajax({
		async:		false,
		type: 		"POST",
		url: 		"../server/loadQuestionsByText.php",
		data: {		"text" : text,	},
		dataType: 	"html",
		success: 	function(questions){
			$("#QContainer").append($("<div>"+questions+"</div>"));
		}
	});
}
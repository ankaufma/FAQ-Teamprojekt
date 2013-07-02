function findAnswers(text) {
	$("#AnswerSelect").append("");
	$.ajax({
		type: 		"POST",
		url: 		"../server/AnswersByText.php",
		data: {		"text" : text,	},
		dataType: 	"html",
		success: 	function(answers){
				$("#AnswerSelect").append($(answers));
		}  
	});
}

function findQuestion(text) {
	$("#searchResults").empty();
	$.ajax({
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
		type: 		"POST",
		url: 		"../server/loadQuestionsByText.php",
		data: {		"text" : text,	},
		dataType: 	"html",
		success: 	function(questions){
			console.log("BLLAAA");
			$("#QContainer").append($("<div>"+questions+"</div>"));
		}
	});
}
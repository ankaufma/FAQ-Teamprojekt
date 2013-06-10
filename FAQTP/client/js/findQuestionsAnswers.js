function findAnswers(text) {
	$("#searchResults").empty();
	$.ajax({
		type: 		"POST",
		url: 		"../server/?????????.php",
		data: {		"text" : text,	},
		dataType: 	"html",
		success: 	function(answers){
				$("#searchResults").append($("<option>"+answers+"</option>"));
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
			console.log(questions);
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
			$("#QContainer").append($("<div>"+questions+"</div>"));
		}
	});
}
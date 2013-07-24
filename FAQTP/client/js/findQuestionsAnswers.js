function findQuestion(text) {
	$("#searchResults").empty();
	$.ajax({
		async:		false,
		type: 		"POST",
		url: 		"../server/questionByText.php",
		data: {		"text" : text,	},
		dataType: 	"html",
		success: 	function(questions){
				$("#searchResults").append($(questions));
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
			console.log(questions);
			if(questions==""){
				$("#QContainer").append($("<div>NO TOPICS WITH THAT CONTENT FOUND</div>"));
			} else {
				$("#QContainer").append($("<div>"+questions+"</div>"));
			}
		}
	});
}
function findAnswers(text) {
		
		$("#AnswerSelect").empty();
		
		$.ajax({
			async: 		false,
			type: 		"POST",
			url: 		"../server/AnswersByText.php",
			data: {		"text" : text,	},
			dataType: 	"html",
			success: 	function(answer){
					$("#AnswerSelect").append($(answer));
			}  
				
		});
		
	}

	function findRelAnswers(text) {

		
		$.ajax({
			async: 		false,
			type: 		"POST",
			url: 		"../server/AnswersByText.php",
			data: {		"text" : text,	},
			dataType: 	"html",
			success: 	function(answer){
					$("#RelateAnswer").append($(answer));
			}  
				
		});
		
	}
	
	function findCategory(text) {


		
		$.ajax({
			async: 		false,
			type: 		"POST",
			url: 		"../server/selectAllKategories.php",
			data: {		"text" : text,	},
			dataType: 	"html",
			success: 	function(cat){
					$("#RelateCategory").append($(cat));
			}  
				
		});
		
	}
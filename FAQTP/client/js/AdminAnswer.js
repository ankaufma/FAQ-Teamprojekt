function findAnswers(text) {


		//select feld muss noch gelöscht werden
		
		$.ajax({
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


		//select feld muss noch gelöscht werden
		
		$.ajax({
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


		//select feld muss noch gelöscht werden
		
		$.ajax({
			type: 		"POST",
			url: 		"../server/selectAllKategories.php",
			data: {		"text" : text,	},
			dataType: 	"html",
			success: 	function(cat){
					$("#RelateCategory").append($(cat));
			}  
				
		});
		
	}
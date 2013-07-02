function buildTree(level, precat) {
	loadQuestionsByCat(precat);
	$.ajax({
			async: 		false,
			type: 		"POST",
			url: 		"../server/catByPreCat.php",
			data: {  
						'precat': precat,
			},
			dataType: 	"json",
			success: 	function(data){
							if(level==1) {
									$("#level2").html($("<div> </div>"));
									$("#level3").html($("<div> </div>"));
									$("#level4").html($("<div> </div>"));
							}
							if(level==2) {
									$("#level3").html($("<div> </div>"));
									$("#level4").html($("<div> </div>"));
							}
							if(level==3) {
									$("#level4").html($("<div> </div>"));
							}
							for(var i=0; i<data.length; i++) {
								if(level==1) {
									$("#level2").append($("<div class=\"navTreeCellgap\"><a class=\"navTreeContent\" href=\"#\" onclick=\"buildTree('2', '"+data[i+1]+"')\">"+data[i]+"</a></div>"));
								}		
								if(level==2) {
									$("#level3").append($("<div class=\"navTreeCellgap\"><a class=\"navTreeContent\" href=\"#\" onclick=\"buildTree('3', '"+data[i+1]+"')\">"+data[i]+"</a></div>"));
								}
								if(level==3) {
									$("#level4").append($("<div class=\"navTreeCellgap\"><a class=\"navTreeContent\" href=\"#\" onclick=\"buildTree('3', '"+data[i+1]+"')\">"+data[i]+"</a></div>"));
								}
								i++;
							}
						}
	});
}

function loadRootCats() {
	$.getJSON('../server/rootCats.php', function(data) {
		for(var i=0; i<data.length; i++) {
			$("#level1").append($("<div class=\"navTreeCellgap\"><a class=\"navTreeContent\" href=\"#\" onclick=\"buildTree('1', '"+data[i+1]+"')\">"+data[i]+"</a></div>"));
			i++;
		}
	});
}

function loadQuestionsByCat(catId) {
	$("#QContainer").html($(""));
	$.ajax({
		async: 		false,
		type: 		"POST",
		url: 		"../server/questionsByCat.php",
		data: {		"cat" : catId,	},
		dataType: 	"html",
		success: 	function(questions){
			$("#QContainer").append($("<div>"+questions+"</div>"));
		}
	});
}

function loadQuestions() {
	$.ajax({
		async: 		false,
		type: 		"POST",
		url: 		"../server/allQuestions.php",
		dataType: 	"html",
		success: 	function(questions){
			$("#QContainer").append($("<div>"+questions+"</div>"));
		}
	});
}
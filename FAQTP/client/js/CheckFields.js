function checkField() {

    
	if(document.getElementById("noQuestions").value == "No new questions without Answers")
	{
		window.location = "index.php"
		document.getElementById("qform").innerHTML = "<form  id=\"qform\" class=\"form-horizontal\" action=\"index.php\" method=\"post\"></from>"
		
	}
}


function checkAdminAnswer(){
	

	 if (document.AdminAnswer.ChoosenQuestion.value == "") {
		    alert("Question Field is empty");
			setTimeout(function() { document.AdminAnswer.ChoosenQuestion.focus(); }, 777);	    
		    return false;
		  }

	 if(document.getElementById("AnswerText").value == "" && document.getElementById("AnswerSelect").selectedIndex == -1){
		 
		 alert("No answer selected");
		 setTimeout(function() { document.getElementById("AnswerText").focus(); }, 777);	
		 return false; 
	 }

	 if(document.AdminAnswer.Cats.selectedIndex == -1 ) {
		 alert("No category selected");
		 setTimeout(function() {  document.AdminAnswer.Cats.focus(); }, 777);	
		
		 return false; 
	 }
	 
}
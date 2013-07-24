function checkAW1() {

    
	if(document.getElementById("noQuestions").value == "No new questions without Answers" || document.getElementById("noQuestions").selectedIndex == -1)
	{
		
		window.location = "index.php"
		return false;
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
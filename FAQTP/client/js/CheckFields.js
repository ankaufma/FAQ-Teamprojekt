function checkAW1() {

    
	if(document.getElementById("noQuestions").value == "No new questions without Answers" || document.getElementById("noQuestions").selectedIndex == -1)
	{
		
		window.location = "index.php"
		return false;
		
		
	}
}

eingeb

function checkAdminAnswer(){
	
	
	 if (document.AdminAnswer.ChoosenQuestion.value == "") {
		    alert("Question Field is empty");
			document.AdminAnswer.ChoosenQuestion.focus();	    
		    return false;
		  }

	 if(document.getElementById("AnswerText").value == "" && document.getElementById("AnswerSelect").selectedIndex == -1){
		 
		 alert("Please enter or select an answer");
		 document.getElementById("AnswerText").focus();	
		 return false; 
	 }

	 if(document.AdminAnswer.Cats.selectedIndex == -1 ) {
		 alert("No category selected");
		 document.AdminAnswer.Cats.focus();
		
		 return false; 
	 }
	  
}
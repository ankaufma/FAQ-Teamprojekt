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
		    document.AdminAnswer.ChoosenQuestion.focus();
		    return false;
		  }
	
	 if(document.AdminAnswer.AnswerSelect.selectedIndex == -1 && document.AdminAnswer.AnswerText.value == "") {
		 alert("No answer selected");
		 document.AdminAnswer.ChoosenQuestion.focus();
		 return false; 
	 }

	 if(document.AdminAnswer.Cats.selectedIndex == -1 ) {
		 alert("No category selected");
		 document.AdminAnswer.Cats.focus();
		 return false; 
	 }
	 
}
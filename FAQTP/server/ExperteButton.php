<?php


if($_SESSION['angemeldet']!= 0){
	
	echo("Session != 0 ");
	
	if($_SESSION['userRole']=='Experte'){
		
		echo("User Role: Experte");
		
		echo("<script type=\"text/javascript\" src=\"../client/js/AnswerQuestion.js\"></script><div><p></p></div><div><button class=\"btn btn-primary\" onclick=\"answerQuestion()\" type=\"button\">Answer Question</button></div>");
		
	}	
	else {
		echo("User role: Kein Experte");
	}

} else {
	
	echo("Session == 0");
	
}

?>
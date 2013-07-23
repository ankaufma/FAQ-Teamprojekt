function checkField() {

    
	if(document.getElementById("noQuestions").value == "Keine neuen Fragen ohne Antworten vorhanden")
	{
		window.location = "index.php"
		document.getElementById("qform").innerHTML = "<form  id=\"qform\" class=\"form-horizontal\" action=\"index.php\" method=\"post\"></from>"
		
	}
}



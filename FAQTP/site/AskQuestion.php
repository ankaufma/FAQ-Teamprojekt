<?php
session_start();
if ( $_SESSION['angemeldet']== true) { 
	echo(
	"<form name=\"questionForm\" id=\"questionForm\" method=\"post\" action=\"../server/applyQuestion.php\">	
		<div>
			<div>
				<h2 name=\"question\" value=\"question\">Ask Question</h2>	
				<textarea name=\"textfeld\" id=\"question\" name=\"question\" class=\"span10 questionTextArea\" rows=\"8\" placeholder=\"Enter your Question and set publicity status\"></textarea>
			</div>		
			<div>

				<div class=\"btn-group\" data-toggle=\"buttons-radio\">
					<button type=\"button\" class=\"btn active\" name=\"veroeffentlichung\" value=\"public\">Public</button>
					<button type=\"button\" class=\"btn\" name=\"veroeffentlichung\" value=\"users only\">Users Only</button>
					<button type=\"button\" class=\"btn\" name=\"veroeffentlichung\" value=\"private\">Private</button>
				</div>
			
				<button class = \"offset1 btn btn-primary\" type=\"submit\" value=\"askQuestion\">Submit</button>
			</div>
		</div>
	</form>");
} else {
	echo(
	"<html>
	<head>
	<script>$('#myModal').modal('show')</script>
	</head>
	</html>
	");
}
?>
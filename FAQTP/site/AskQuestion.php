<?php
session_start();
if ( $_SESSION['angemeldet']== true) { 
	echo(
	"<form name=\"questionForm\" id=\"questionForm\" method=\"post\" action=\"../server/applyQuestion.php\">	
		<div>
			<div>
				<h2>Ask Question</h2>	
				<textarea id=\"question\" name=\"question\" class=\"span10 questionTextArea\" rows=\"8\" placeholder=\"Enter your Question and set publicity status\"></textarea>
			</div>		
			<div>
				<div class=\"btn-group\" data-toggle=\"buttons-radio\">
					<button class=\"btn active\" id=\"veroeffentlichung\" name=\"veroeffentlichung\" value=\"public\">Public</button>
					<button class=\"btn\" id=\"veroeffentlichung\" name=\"veroeffentlichung\" value=\"users only\">Users Only</button>
					<button class=\"btn\" id=\"veroeffentlichung\" name=\"veroeffentlichung\" value=\"private\">Private</button>
				</div>
				<button class = \"offset1 btn btn-primary\" type=\"submit\">Submit</button>
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
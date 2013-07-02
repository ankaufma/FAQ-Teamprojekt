<link rel="stylesheet" href="../client/css/slider.css"></link>
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

				
				<div class=\"span5 switch switch-three candy yellow\">
					<input type=\"radio\" name=\"veroeffentlichung\" id=\"veroeffentlichung1\" value=\"public\" checked>
					<label for=\"veroeffentlichung1\" onclick=\"\" class=\"radio\">Public</label>
					
					<input type=\"radio\" name=\"veroeffentlichung\" id=\"veroeffentlichung2\" value=\"users only\">
					<label for=\"veroeffentlichung2\" class=\"radio\" onclick=\"\">Users Only</label>
					
					<input type=\"radio\" name=\"veroeffentlichung\" id=\"veroeffentlichung3\" value=\"private\">	
					<label class=\"radio\" for=\"veroeffentlichung3\" onclick=\"\">Private</label>
						
					
					<span class=\"slide-button\"></span>
				</div>
			
			
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
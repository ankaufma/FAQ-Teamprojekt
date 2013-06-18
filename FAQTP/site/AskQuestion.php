<?php
session_start();
if ( isset($_SESSION['username']) ) { 
	echo(
	"<form name=\"questionForm\" id=\"questionForm\" method=\"post\" action=\"../server/applyQuestion.php\">	
	<p>
		<label name=\"question\" value=\"question\">Deine Frage: </label>	
		<textarea id=\"question\" name=\"question\"></textarea>
	</p>
	<p>
		<label name=\"veroeffentlichung\" value=\"veroeffentlichung\">Veröffentlichungsstatus</label>
		<input type=\"radio\" name=\"veroeffentlichung\" value=\"public\">Public
   		<input type=\"radio\" name=\"veroeffentlichung\" value=\"users only\">Users Only
    	<input type=\"radio\" name=\"veroeffentlichung\" value=\"private\">Private
    </p>
	<button type=\"submit\" value=\"askQuestion\">Ask your Question</button>
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
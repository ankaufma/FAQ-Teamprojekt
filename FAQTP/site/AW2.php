<!DOCTYPE html>
<html>
<head>
<title>FAQ-Manager</title>
<!-- Einbinden des Bootstrap-Stylesheets -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- optional: Einbinden der jQuery-Bibliothek -->
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<script type="text/javascript">
	function findAnswers(text) {


		//select feld muss noch gelöscht werden
		
		$.ajax({
			type: 		"POST",
			url: 		"../server/AnswersByText.php",
			data: {		"text" : text,	},
			dataType: 	"html",
			success: 	function(answer){
				
					$("#AnswerSelect").append($(answer));
			}  
				
		});
		
	}</script>

<!-- optional: Einbinden der Bootstrap-JavaScript-Plugins -->
<script src="js/bootstrap.min.js"></script>




</head>
<body>
	<h1>FAQ-Manager</h1>


	<h2>Frage:</h2>
	<div class="row">
		<div class="span4">
			<?php

			include('..\server\QuestionById.php');

			?>

		</div>

		<h2>Type in Answer</h2>
		<div>
			<textarea></textarea>
		</div>
	
		<h2>Or Choose available answer</h2>

		<div>
			<input type="text" onkeyup="findAnswers(this.value)">
		</div>

		<div>
			<select id="AnswerSelect" name="AnswerSelect" size=5 width="300" style="width: 300px">
			</select>
		</div>

	</div>


	<button class="btn btn-link btn-small" type="button"
		onclick="window.location.replace('index.php')">Submit</button>







</body>
</html>


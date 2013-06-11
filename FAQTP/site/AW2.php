<!DOCTYPE html>
<html>
  <head>
    <title>FAQ-Manager</title>
    <!-- Einbinden des Bootstrap-Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
 
    <!-- optional: Einbinden der jQuery-Bibliothek -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
 
    <!-- optional: Einbinden der Bootstrap-JavaScript-Plugins -->
    <script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	
		//window.location.replace('index.php')
	
	</script>



	
  </head>
  <body>
    <h1>FAQ-Manager</h1>

	<div class="row"> 
		<div class="span4">
			<?php

				include('..\server\QuestionById.php');
		
			?>
		
		</div>
		
		
				<select id="AnswerSelect" name="auswahl_frage" size=5 >
				<?php
			
					include('..\server\loadAnswersByText.php');
					
				?> 
		
				</select>
			
		  	
		
		</div>
		
		
		
		
		
		
		
			
		<button class="btn btn-link btn-small" type="button" onclick="window.location.replace('index.php')">Submit</button>
							
		
	</div>
			


	
</body>
</html>
   

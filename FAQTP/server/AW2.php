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
	
	
	
	</script>


	
  </head>
  <body>
    <h1>FAQ-Manager</h1>

	<div class="row">
		<div class="span4">
	
	
	
		
		<?php
					include('..\business\fascade\fascade.php');
					$fassi = new Fascade(); 
					$question=Array();
			
					foreach($fassi->showQuestionById($_POST['auswahl_frage']) as $myQ) {
							
							echo ("<textarea rows=\"2\">".$myQ->getQuestion()."</textarea>");		
					
					}	
		?>
		</div>
	</div>
			


	
</body>
</html>
   

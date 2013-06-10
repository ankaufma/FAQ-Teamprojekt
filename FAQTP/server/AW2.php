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
		<div class="span4"><textarea rows="2"><?php echo $_POST['auswahl_frage'];?></textarea></div>
	</div>
	
	<div class="row">
		<div class="span4"><textarea rows="2">
		
		<?php
					include('..\business\fascade\fascade.php');
					$fassi = new Fascade(); 
					$question=Array();
					
					
					
					foreach($fassi->showQuestionNoAnswer() as $myQ) {
					
					
				    		echo("<option value=".$myQ->getQuestionId().">".$myQ->getQuestion()." vom: ".$myQ->getQDate()."</option>");
				 		
				   
						
					 }
					 
					if($myQ==Null){
						
						echo ("<option>Keine neuen Fragen ohne Antworten vorhanden</option>");
						
					}
					
					
				?>
		
		</textarea></div>
	</div>
	
			


	
</body>
</html>
   

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
	
	

	
  </head>
  <body>
    <h1>FAQ-Manager</h1>

	<div class="row-fluid">
	
		
	<div class="span4">
		
		<form  class="form-horizontal" method="post">
			
		
			<select id="select" name="auswahl_frage" size=5>
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
			
			
			</select>
			
			
			
		 <button type="submit" onclick="meineMethode(select.value)" class="btn">Submit</button>
		</form>
			

	</div>
	<div class="span4"></div>
	</div>
</body>
</html>
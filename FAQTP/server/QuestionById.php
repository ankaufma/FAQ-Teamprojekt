		<?php
					include('..\business\fascade\fascade.php');
					$fassi = new Fascade(); 
					$question=Array();
			
					foreach($fassi->showQuestionById($_POST['auswahl_frage']) as $myQ) {
							
							echo ("<textarea rows=\"2\">".$myQ->getQuestion()."</textarea>");		
					
					}	
		?>
	
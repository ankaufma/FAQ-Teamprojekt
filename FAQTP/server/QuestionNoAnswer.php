
				<?php
				include('..\business\fascade\fascade.php');
				$fassi = new Fascade();
				$question=Array();
					
					
					
				foreach($fassi->showQuestionNoAnswer() as $myQ) {
						
						
					echo("<option value=".$myQ->getQuestionId().">".$myQ->getQuestion()." vom: ".$myQ->getQDate()."</option>");
				
						
				
				}
					
				if($myQ==Null){
				
					echo ("<option id=\"noQuestions\">No new questions without Answers</option>");
					
				}
					
					
				?>
			
			
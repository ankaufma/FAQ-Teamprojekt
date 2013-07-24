
				<?php
				include('..\business\fascade\fascade.php');
				$fassi = new Fascade();
				$question=Array();
					
				$myQ=null;	
					
				foreach($fassi->showQuestionNoAnswer() as $myQ) {
						
						
					//echo("<option value=".$myQ->getQuestionId().">".$myQ->getQuestion()." - date: ".$myQ->getQDate()."</option>");
				
					echo("<option value=".$myQ->getQuestionId().">Date: ".$myQ->getQDate()." - ".$myQ->getQuestion()."</option>");
						
				
				}
					
				if($myQ==Null){
				
					echo ("<option id=\"noQuestions\">No new questions without Answers</option>");
					
				}
					
					
				?>
			
			
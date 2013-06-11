<?php
	include('/../business/fascade/fascade.php');
	$cat = $_POST['cat'];
	$fassi = new Fascade();
	
	echo("<h2 class=\"headersContainers\">Result List</h2>
			<div class = \"row-fluid\">
				<div class =\"span12 qacContainer\">
		");

// 	<!-- ============================================================================ -->
// 	<!-- 							Question
// 	<!-- ============================================================================ -->	
	foreach($fassi->showQuestionsByCategory($cat) AS $myQs) {
			echo("
					
				<!-- bsp. QUESTTION -->	
				<div class = \"row-fluid questionObject\">
					
					<div class = \"span12 question\">
							<p class=\"questionFont\">".$myQs->getQuestion()."</p>
					</div>
					
					<div class = \"row-fluid questionFooter\">
						<div class=\" span2 offset1 \">
							<a class=\"btn btn-mini\" data-toggle=\"collapse\" data-target=\"#".$myQs->getQuestionId()."\">
  								hide/show answer
							</a>
						</div>
					
					
						<div class=\" span8\"> 
					       <p class=\"questionFooterText\">(Autor, Datum)</p>
						</div>
					</div>
					
				<!-- Container begin for answers-->
					<div id=".$myQs->getQuestionId()." class = \"row-fluid  collapse\">
				");
		
			
// 	<!-- ============================================================================ -->
// 	<!-- 						Answers
// 	<!-- ============================================================================ -->			
		foreach($myQs->getAnswers() as $myA) {
					echo("
					<!-- bsp. ANSWER -->
					<div id=\"answer\" class =\"row-fluid\">
						<div class = \"span10 answer\">
							<p class = \"answerFont\">".$myA->getAnswer()."</p>
						</div>
						<div class = \"span1 offset1\" id=\"star\"> 
							".$fassi->showRatingByAnswer($myA)."
						</div>
						
						<div class = \"row-fluid questionFooter\">
							<div class=\"span3 offset1 \">
								<a class=\"btn btn-mini\" data-toggle=\"collapse\" data-target=\"#comments\">
  									hide/show comments
								</a>
							</div>
						</div>	
							
					</div>
							
				<!-- Container begin for comments-->							
					<div id=\"comments\" class =\"row-fluid collapse\">

						<div class =\"row-fluid\">		
							<div class=\"span2 offset1\">
								 <button class=\"btn btn-mini btn-primary\" type=\"button\">Leave Comment</button>
							</div> 
						</div>
			");

			
// 	<!-- ============================================================================ -->
// 	<!-- 							Comments
// 	<!-- ============================================================================ -->			
			foreach($fassi->showCommentsByAnswer($myA) as $myC) {
				echo("
						
						<div class=\"comment in span8 offset1\">
							<p class=\"commentText\">  ".$myC->getComment()."</p>
						</div>
						
						<div class=\"span4 offset6 commentFooter\"> 
					       <p class=\"commentFooterFont\">(Autor, Datum)</p>
						</div>
						");
			}	
			echo("</div>");
			
		}
		echo("</div></div>");
	}
	
	echo("	
				</div>
			</div>
		");
?>
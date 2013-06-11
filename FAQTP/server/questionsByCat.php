<?php
	include('/../business/fascade/fascade.php');
	$cat = $_POST['cat'];
	$fassi = new Fascade();
	foreach($fassi->showQuestionsByCategory($cat) AS $myQs) {
		echo("<p></p>");
		echo("<div>Frage: ".$myQs->getQuestion()."</div>");
		foreach($myQs->getAnswers() as $myA) {
			echo("<div>Antowrt: ".$myA->getAnswer()."</div>");
			echo("<div>Rating:  ".$fassi->showRatingByAnswer($myA)."</div>");
			foreach($fassi->showCommentsByAnswer($myA) as $myC) {
				echo("<div>Comments:  ".$myC->getComment()."</div>");
			}
		}
		echo("<p></p>");
	}
?>
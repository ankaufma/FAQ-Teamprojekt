<?php
	include('/../business/fascade/fascade.php');
	$fassi = new Fascade();
	foreach($fassi->showQuestionAnswerDTO() AS $myQs) {
		echo("<p></p>");
		echo("<div>Frage: ".$myQs->getQuestion()."</div>");
		foreach($myQs->getAnswers() as $myA) {
			echo("<div>Antwort: ".$myA->getAnswer()."</div>");
			echo("<div>Rating:  ".$fassi->showRatingByAnswer($myA)."</div>");
		}
		echo("<p></p>");
	}
?>
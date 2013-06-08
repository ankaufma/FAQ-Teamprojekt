<?php
	include('/../business/fascade/fascade.php');
	$cat = $_POST['cat'];
	$fassi = new Fascade();
	foreach($fassi->showQuestionsByCategory($cat) AS $myQs) {
		echo("<p></p>");
		echo("<div>Frage: ".$myQs->getQuestion()."</div>");
		foreach($myQs->getAnswers() as $myA) {
			echo("<div>Antwort: ".$myA->getAnswer()."</div>");
			echo("<div>Rating:  ".$fassi->showRatingByAnswer($myA)."</div>");
		}
		echo("<p></p>");
	}
?>
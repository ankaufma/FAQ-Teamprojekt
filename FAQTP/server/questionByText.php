<?php
include('/../business/fascade/fascade.php');
$text = $_POST['text'];
$fassi = new Fascade();
foreach($fassi->showQuestionByText($text) AS $myQs) {
	
	if($myQs->getAnswers() != true) {
		continue;
	}
	
	echo("<option>".$myQs->getQuestion()."</option>");
	
};
?>
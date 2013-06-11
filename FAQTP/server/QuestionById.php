
<?php
include('..\business\fascade\fascade.php');
$fassi = new Fascade();
$question=Array();
	
foreach($fassi->showQuestionById($_POST['auswahl_frage']) as $myQ) {
		
	echo ("<textarea id=\"ChoosenQuestion\"  rows=\"2\">".$myQ->getQuestion()."</textarea>");
	echo ("<span hidden=\"true\"><input type=\"text\" id=\"qid\">".$myQ->getQuestionId()."</input></span>");	
}
?>
 

<?php
include('..\business\fascade\fascade.php');
$fassi = new Fascade();
$question=Array();
	
foreach($fassi->showQuestionById($_POST['auswahl_frage']) as $myQ) {
		
	echo ("<textarea id=\"ChoosenAnswer\" value=".$myQ->getQuestionId()." rows=\"2\">".$myQ->getQuestion()."</textarea>");
		
}
?>
 
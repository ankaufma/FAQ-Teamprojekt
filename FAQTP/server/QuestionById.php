
<?php
include('../business/fascade/fascade.php');
$fassi = new Fascade();
$question=Array();
	
foreach($fassi->showQuestionById($_POST['auswahl_frage']) as $myQ) {
		
	echo ("<textarea name=\"ChoosenQuestion\" id=\"ChoosenQuestion\" class=\"span12 textareas\"  rows=\"6\">".$myQ->getQuestion()."</textarea>");
	echo ("<span hidden=\"TRUE\"><input type=\"text\" name=\"qid\" value=\"".$myQ->getQuestionId()."\" id=\"qid\"/></span>");	
}
?>
 
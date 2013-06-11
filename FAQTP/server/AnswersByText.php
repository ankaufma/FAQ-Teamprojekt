<?php
include('/../business/fascade/fascade.php');
$text = $_POST['text'];
$fassi = new Fascade();
foreach($fassi->showAnswersByText($text) AS $myQs) {
	echo("<option value=".$myQs->getAnswerId().">".$myQs->getAnswer()."<option>");
};
?>
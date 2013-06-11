<?php
include('/../business/fascade/fascade.php');
$text = $_POST['text'];
$fassi = new Fascade();
foreach($fassi->showAnswersByQText($text) AS $myQs) {
	echo($myQs->());
};
?>
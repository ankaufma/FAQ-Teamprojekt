<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
$zubeantwortendeFrage = $_POST['qid'];
$eingetippteAntwort = $_POST['AnswerText'];
$categoryId = $_POST['Cats'];
if(isset($_POST['AnswerSelect'])) {
	foreach($_POST['AnswerSelect'] AS $relatedAnswer) {
		$fassi->applyRelAnswer($zubeantwortendeFrage,$relatedAnswer);
	}
}
session_start();
$fassi->applyAnswer($eingetippteAntwort,$_SESSION['username'],$zubeantwortendeFrage);
$fassi->applyCatToQuestion($categoryId,$zubeantwortendeFrage);



// send mail to user
/*
$empfaenger = "thwinter@htwg-konstanz.de";
$betreff = "Die Mail-Funktion";
$from = "From: Experte <absender@domain.de>";
$text = "Your question XY was answered";

mail($empfaenger, $betreff, $text, $from);
*/


?>
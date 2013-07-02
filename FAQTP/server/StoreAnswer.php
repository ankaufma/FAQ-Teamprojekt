<?php
$zubeantwortendeFrage = $_POST['qid'];
$eingetippteAntwort = $_POST['AnswerText'];
$categoryId = $_POST['Cats'];

include('/../business/fascade/fascade.php');
$fassi = new Fascade();
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
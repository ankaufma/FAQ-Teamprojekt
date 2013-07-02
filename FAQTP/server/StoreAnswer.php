<?php
$zubeantwortendeFrage = $_POST['qid'];
$eingetippteAntwort = $_POST['AnswerText'];

include('/../business/fascade/fascade.php');
$fassi = new Fascade();
session_start();
$fassi->applyAnswer($eingetippteAntwort,$_SESSION['username'],$zubeantwortendeFrage);



// send mail to user
/*
$empfaenger = "thwinter@htwg-konstanz.de";
$betreff = "Die Mail-Funktion";
$from = "From: Experte <absender@domain.de>";
$text = "Your question XY was answered";

mail($empfaenger, $betreff, $text, $from);
*/


?>
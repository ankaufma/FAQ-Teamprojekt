<?php
$zubeantwortendeFrage = $_POST['qid'];
$eingetippteAntwort = $_POST['AnswerText'];

include('/../business/fascade/fascade.php');
$fassi = new Fascade();
session_start();
$fassi->applyAnswer($eingetippteAntwort,$_SESSION['username'],$zubeantwortendeFrage);

?>
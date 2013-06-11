<?php
$ZubeantwortendeFrage=$_POST['ChoosenQuestion'];
$EingetippteAntwort=$_POST['AnswerText'];
$AusgewaehlteVorhandeneAntwort=$_POST['AnswerSelect'];


include('/../business/fascade/fascade.php');
$fassi = new Fascade();
session_start();
$fassi->applyAnswer($_POST['AnswerText'],$_SESSION['username']);




?>
<html>
<head>
<title>FAQ-Manager</title>
<meta http-equiv="refresh" content="0; URL= ../site/index.php">

<script type="text/javascript" src="../client/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../client/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript" src="../client/js/bootstrap.js"></script>
<script type="text/javascript" src="../client/js/jquery.raty.min.js"></script>

<link rel="stylesheet" href="../client/css/bootstrap.min.css"></link>
<link rel="stylesheet" href="../client/css/MessageBoxes.css"></link>
<link rel="stylesheet" href="../client/css/HomeCSS.css"></link>

</head>
<body>
</body>
</html>

<?php
if(trim($_POST['qid'])=="" || trim($_POST['AnswerText'])=="" || trim($_POST['Cats'])=="") {
	header("Location: errorpageUnknown.php");
}
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
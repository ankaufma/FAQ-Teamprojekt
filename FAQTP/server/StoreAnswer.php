<html>


<head>
<title>FAQ-Manager</title>

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



if(trim($_POST['AnswerText'])=="" && trim($_POST['AnswerSelect'])!==""){

	unset($_POST['AnswerText']);

}


if(trim($_POST['qid'])==""  ||(trim($_POST['AnswerText'])==""  && isset($_POST['AnswerSelect'])==false)) {
	
	header("Location: errorpageUnknown.php");
	
	
}else{
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
$zubeantwortendeFrage = $_POST['qid'];
$categoryId = $_POST['Cats'];




if(isset($_POST['AnswerSelect'])) {
	foreach($_POST['AnswerSelect'] AS $relatedAnswer) {
		$fassi->applyRelAnswer($zubeantwortendeFrage,$relatedAnswer);
	}
}



if(isset($_POST['ChoosenQuestion'])) { 

		$fassi->updateQuestion($zubeantwortendeFrage,$_POST['ChoosenQuestion']);
}

session_start();
if(isset($_POST['Cats'])) {
	foreach($categoryId AS $category) {
		$fassi->applyCatToQuestion($category,$zubeantwortendeFrage);
	}
}

if(isset($_POST['AnswerText'])){
$fassi->applyAnswer($_POST['AnswerText'],$_SESSION['username'],$zubeantwortendeFrage);
}
//$fassi->applyCatToQuestion($categoryId,$zubeantwortendeFrage);
header("Location: ../site/index.php");




// send mail to user
/*
$empfaenger = "<empfaengerName>@<domain>.<end>";
$betreff = "FAQ Manager - Question answered";
$from = "From: Experte <absender@domain.de>";
$text = "Your question has been answered by an expert!!!";

mail($empfaenger, $betreff, $text, $from);
*/
}

?>
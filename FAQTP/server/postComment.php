<meta http-equiv="refresh" content="0; URL= ../site/index.php">
<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
$comment = $_POST['comment'];
$user =	$_POST['user'];
$answer = $_POST['answer'];
$fassi->applyComment($user,$answer,$comment);
?>
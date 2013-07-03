<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
$fassi->applyRating($_POST['user'],$_POST['answer'],$_POST['score']);
?>
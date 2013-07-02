<html>
<head>
</head>
<body>Ihr Frage wird in Kürze beantwortet.
</body>
</html>
<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
session_start();
$fassi->applyQuestion($_POST['question'],$_POST['veroeffentlichung'],$_SESSION['username']);
?>
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
print_r($_POST['question']);
print_r($_SESSION['username']);
print_r($_POST['veroeffentlichung']);
$fassi->applyQuestion($_POST['question'],$_POST['veroeffentlichung'],$_SESSION['username']);
?>
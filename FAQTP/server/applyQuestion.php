<html>
<head>
</head>
<body>Ihr Frage wird in K�rze beantwortet.
</body>
</html>
<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
session_start();
echo($_POST['question']);
echo($_SESSION['username']);
echo($_POST['veroeffentlichung']);
$fassi->applyQuestion($_POST['question'],$_POST['veroeffentlichung'],$_SESSION['username']);
?>
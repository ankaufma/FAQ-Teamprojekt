<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	$userName = $_POST['username'];
	$userPW = $_POST['passwort'];
	if($fassi->checkUser($userName,$userPW)==true){
		if($userName == $_SESSION["berechtigter_User"]){
				
		}else{
			$_SESSION["berechtigter_User"] = $userName;
		}
	}
}else{
	header("HTTP/1.1 403 Forbidden");
	exit( file_get_contents( '/../business/fascade/errorpage.php' ) );
}
?>
<html>
<head>
</head>
<body>
	<button class="btn btn-link btn-small" type="button"
		onclick="window.location.replace('Register.php')">register</button>
</body>
</html>

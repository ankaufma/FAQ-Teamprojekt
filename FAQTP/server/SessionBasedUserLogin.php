<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
$userName = $_POST['username'];
$userPW = $_POST['passwort'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	if($fassi->checkUser($userName,$userPW)==true){
		if($userName == $_SESSION["berechtigter_User"]){
			print_r($_SESSION["berechtigter_User"]);
		}else{
			$_SESSION["berechtigter_User"] = $userName;
			print_r($_SESSION["berechtigter_User"]);
		}
	}
}else{
// 	header("HTTP/1.1 403 Forbidden");
// 	exit( file_get_contents( '/../business/fascade/errorpage.php' ) );
}
?>

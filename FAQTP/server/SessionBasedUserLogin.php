<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
$userName = $_POST['username'];
$userPasswort = $_POST['passwort'];
session_start();

if($fassi->checkUser($userName,$userPasswort)){
	$_SESSION['username'] = $userName;
	print_r($_SESSION);
	echo $_SESSION['username'];
}
?>

<?php
include('/../business/fascade/fascade.php');
if(!empty($_POST['username']) or  !empty($_POST['passwort'])){
	$fassi = new Fascade();	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	$_SESSION['angemeldet']= false;
	$username = $_POST['username'];
	$_SESSION['username'] = $username;
	$userDTO = $fassi->userByUsername($username);
	$_SESSION['userRole']= $userDTO->getUserrole();
	$passwort = $_POST['passwort'];
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

	// Benutzername und Passwort werden überprüft
	if ($fassi->checkUser($_SESSION['username'],$passwort)and !$_SESSION['angemeldet']) {
		$_SESSION['angemeldet'] = true;

		// Weiterleitung zur geschützten Startseite
		if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
			if (php_sapi_name() == 'cgi') {
				header('Status: 303 See Other');
			}
			else {
				header('HTTP/1.1 303 See Other');
			}
		}
		header('location: /../site/start.php');
		exit;
	}else{
		$_SESSION['angemeldet'] = false;
	}
}
}else
{
	sleep(500);
	header("Location: errorpage.php");
}
?>

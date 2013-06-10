<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();

	$username = $_POST['username'];
	$passwort = $_POST['passwort'];
	$_SESSION['username'] = $username;
	$_SESSION['passwort'] = $passwort;

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

	// Benutzername und Passwort werden überprüft
	if ($fassi->checkUser($_SESSION['username'],$_SESSION['passwort'])) {
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
	}
}
foreach($_SESSION as $sessionWert){
	//echo $sessionWert;
	print_r($sessionWert);
} 
echo '<br><a href="/../site/Login.php">Weiter</a><br>';
?>

<?php
$_SESSION['angemeldet']= null;
session_start();
if($_SESSION['angemeldet']==0){
	if(trim($_POST['username']) != ""){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			include('/../business/fascade/fascade.php');
			$fassi = new Fascade();
			$username = $_POST['username'];
			$_SESSION['username'] = $username;
			$userDTO = $fassi->userByUsername($username);
			$_SESSION['userRole']= $userDTO->getUserrole();
			$passwort = $_POST['password'];
			$hostname = $_SERVER['HTTP_HOST'];
			$path = dirname($_SERVER['PHP_SELF']);
			// Benutzername und Passwort werden überprüft
			if ($fassi->checkUser($_SESSION['username'],$passwort) == 0) {
				$_SESSION['angemeldet'] = true;
				header("Location: ../site/index.php");
				// Weiterleitung zur geschützten Startseite
				if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
					if (php_sapi_name() == 'cgi') {
						header('Status: 303 See Other');
					}
					else {
						header('HTTP/1.1 303 See Other');
					}
				}
			}else{
				$_SESSION['angemeldet'] = false;
			}
		}
	}else{
		header("Location: errorpage.php");
	}
}else{
	header("Location: errorpage.php");
}
?>

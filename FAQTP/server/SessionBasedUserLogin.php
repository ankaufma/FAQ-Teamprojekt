<?php
session_start();
	if(trim($_POST['username']) != "" || trim($_POST['password']!="")){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			include('/../business/fascade/fascade.php');
			$fassi = new Fascade();
			$username = $_POST['username'];
			$_SESSION['username'] = $username;
			$passwort = $_POST['password'];
			$hostname = $_SERVER['HTTP_HOST'];
			$path = dirname($_SERVER['PHP_SELF']);
			// Benutzername und Passwort werden überprüft
			if ($fassi->checkUser($_SESSION['username'],$passwort) == true) {
				$_SESSION['angemeldet'] = true;
				$_SESSION['test'] = $_SESSION['angemeldet'];
				$userDTO = $fassi->userByUsername($username);
				$_SESSION['userRole']= $userDTO->getUserrole();
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
				$_SESSION['test'] = $_SESSION["angemeldet"];
				header("Location: errorpage.php");
			}
		}
	}else{
		header("Location: errorpage.php");
	}
?>

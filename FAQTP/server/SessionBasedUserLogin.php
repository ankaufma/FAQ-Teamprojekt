<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();

// if($fassi->checkUser($userName,$userPasswort)){
// 	$_SESSION['username'] = $userName;
// 	print_r($_SESSION);
// 	echo $_SESSION['username'];
// }

session_start();
if($fassi->checkUser($userName,$userPasswort)){
	if (isset($_POST['passwort'])) { // Wurde das Formular abgesandt?
		$userName = $_POST['username'];
		$passwort = trim($_POST['passwort']);
		$_SESSION['logged'] = true; // Dann bist du eingeloggt.
		$logged_in = true;
	} elseif (isset($_SESSION['logged']) && $_SESSION['logged']) { // Bist du schon angemeldet?
		$logged_in = true; // Dann bist du eingeloggt.
	} else {
		$logged_in = false; // Dann eben nicht.
	}

	if (!$logged_in) { // Wenn du nicht eingeloggt bist:
		echo '<p><b>Bitte einloggen</b>'.(isset($error)?'<br />'.$error:'').'</p>'; // Falls du ein Falsches Passwort eingegeben hast.
		exit(); // Beenden, hier ist Endstation.
	}
	// Hier ist man eingeloggt.
	echo 'Du bist eingeloggt =)';
}
?>

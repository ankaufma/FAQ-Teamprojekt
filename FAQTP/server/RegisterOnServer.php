<html>
<head>
</head>
<body>
</body>
</html>
<?php
if (trim ( $_POST ['inputUserName'] ) != "" && trim ( $_POST ['inputVorname'] ) != "" && trim ( $_POST ['inputNachname'] ) != "" && trim ( $_POST ['inputEmail'] ) != "" && trim ( $_POST ['inputPassword'] ) != "") {
	if ($_POST ['inputPassword'] == $_POST ['inputPassword2']) {
		include ('/../business/fascade/fascade.php');
		$fassi = new Fascade ();
		$userName = $_POST ['inputUserName'];
		$userVorName = $_POST ['inputVorname'];
		$userNachname = $_POST ['inputNachname'];
		$userEmail = $_POST ['inputEmail'];
		$userPasswort = $_POST ['inputPassword'];
		if(!$fassi->applyUser( $userVorName, $userNachname, $userName, $userEmail, $userPasswort )) {
			header ( "Location: errorpageLogin.php" );
		}
		else {
			header ( "Location: errorpageUserExists.php" ); //=====????????
		}
		header("Location: ../site/index.php");
	} else {
		header ( "Location: errorpageLogin.php" );
	}
} else {
	header ( "Location: errorpageLogin.php" );
}
?>

html>
	<head>
	<meta http-equiv="refresh" content=0"; URL=../site/index.php">
	</head>
	<body>
	</body>
	</html>
	
<?php
	include('/../business/fascade/fascade.php');
	$fassi = new Fascade();
	$userName = $_POST['user'];
	$userVorName = $_POST['vorname'];
	$userNachname = $_POST['nachname'];
	$userEmail = $_POST['email'];
	$userPasswort = $_POST['passwort'];
	$fassi->applyUser($userVorName,$userNachname,$userName,$userEmail,$userPasswort);
?>
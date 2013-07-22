html>
	<head>
	<meta http-equiv="refresh" content=0"; URL=../site/index.php">
	</head>
	<body>
	</body>
	</html>
	
<?php
if(trim($_POST['user'])!="" && trim($_POST['vorname'])!="" && trim($_POST['nachname'])!="" && trim($_POST['email'])!="" && trim($_POST['passwort'])!=""){
	include('/../business/fascade/fascade.php');
	$fassi = new Fascade();
	$userName = $_POST['user'];
	$userVorName = $_POST['vorname'];
	$userNachname = $_POST['nachname'];
	$userEmail = $_POST['email'];
	$userPasswort = $_POST['passwort'];
	$fassi->applyUser($userVorName,$userNachname,$userName,$userEmail,$userPasswort);
	}else{
		header("Location: errorpageUnknown.php");
	}
?>